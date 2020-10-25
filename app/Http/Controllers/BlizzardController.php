<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use GuzzleHttp\Client;

class BlizzardController extends Controller
{

    public $roster;
    public $concil;

    private $apiToken;
    private $apiRealm = 'azralon';
    private $apiGuild = 'manifesto';
    private $apiLocale = 'pt_BR';
    private $apiStaticNamespace = 'static-us';
    private $apiProfileNamespace = 'profile-us';
    private $apiBaseUrl = 'https://us.api.blizzard.com/data/wow';
    private $apiProfileUrl = 'https://us.api.blizzard.com/profile/wow/character';
    private $wowCharacterUrl = 'https://worldofwarcraft.com/pt-br/character/us';


    public function __construct()
    {
        $this->getRoster();
    }

    protected function getMedia($character)
    {
        $name = strtolower($character);
        $apiUrl = $this->apiProfileUrl . "/{$this->apiRealm}/{$name}/character-media?namespace={$this->apiProfileNamespace}&locale={$this->apiLocale}&access_token={$this->apiToken}";        //--
        $http = new Client();
        $response = $http->get($apiUrl);
        $response = json_decode((string) $response->getBody(), true)['assets'];
        //--
        foreach ($response as $key => $value) {
            if ($value['key'] === 'avatar') {
                return $value['value'];
            }
        }
    }

    protected function getRoster()
    {
        $races = config('blizzard.races');
        $classes = config('blizzard.classes');

        //--

        $http = new Client();

        //--

        $responseToken = $http->post(config('blizzard.urlAuthToken'), [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env('BLIZZARD_CLIENT_ID'),
                'client_secret' => env('BLIZZARD_SECRET_ID'),
                'redirect_uri' => config('blizzard.urlAuthRedirect'),
            ],
        ]);
        $apiToken = json_decode((string) $responseToken->getBody(), true)['access_token'];

        //--

        $rosterUrl = config('blizzard.urlBaseData')
            . "/guild/" . config('blizzard.realm')
            . "/" . config('blizzard.guild')
            . "/roster?namespace=" . config('blizzard.namespaceProfile')
            . "&locale=" . config('blizzard.locale')
            . "&access_token=" . $apiToken;

        $responseRoster = $http->get($rosterUrl);

        $roster = json_decode((string) $responseRoster->getBody(), true)['members'];

        //--

        $quantidade = sizeof($roster);
        for ($x = 0; $x < $quantidade; $x++) {

            $idClass = $roster[$x]['character']['playable_class']['id'];
            $idRace = $roster[$x]['character']['playable_race']['id'];
            $name = $roster[$x]['character']['name'];
            $rank = $roster[$x]['rank'];

            if ($rank === 1 || $rank === 2) {

                $mediaUrl = config('blizzard.urlBaseProfile')
                    . "/" . config('blizzard.realm')
                    . "/" . strtolower($name)
                    . "/character-media?namespace=" . config('blizzard.namespaceProfile')
                    . "&locale=" . config('blizzard.locale')
                    . "&access_token=" . $apiToken;
                $responseMedia = $http->get($mediaUrl);
                $mediaCharacter = json_decode((string) $responseMedia->getBody(), true)['assets'][3]['value'];

                //--

                $this->roster[] = [
                    'name' => $name,
                    'class' => $classes[$idClass],
                    'race' => $races[$idRace],
                    'image' => $mediaCharacter,
                    'social' => [
                        'wow' => config('blizzard.urlCharacterWow') . "/" . config('blizzard.realm') . "/" . strtolower($name),
                        'rio' => config('blizzard.urlCharacterRaiderio') . $name,
                    ]
                ];

                if ($rank === 1) {
                    $this->concil[] = [
                        'name' => $name,
                        'class' => $classes[$idClass],
                        'image' => $mediaCharacter,
                    ];
                }
            }
        }
    }
}
