<?php
namespace App\Libs;

use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Symfony\Component\DomCrawler\Crawler;

class Util
{

    public static function xyz_curl()
    {
        return 1;
    }

    public function compare_text( $data = array() )
    {
        if (!count($data) || empty($data)) {
            logger('data is not exitsts.');
        }
        for ($i = 0; $i < count($data->prod->path); $i++) {
            $path = $data->prod->path[$i];
            $url = $data->prod->url . $path->name;
            for ($j = 0; $j < count($path->css); $j++) {
                $prod_text = null;
                $dev_text = null;
                $prod_text = $this->get_text($url, 'GET', $path->css[$j]);
//                print "\nprod_text: ".$prod_text;
                # lookup def_text
                $dev_text = $this->get_text(
                    $data->dev->url . $data->dev->path[$i]->name, 'GET', $data->dev->path[$i]->css[$j]);
//                print "\ndev_text: ".$dev_text;
                # assertion
                print $this->assertEquals($prod_text, $dev_text);
                # sleep time
                sleep(1);
            }
        }
    }

    public static function get_text($url = "", $method = "GET", $cssSelector = "body")
    {
        $client = new Client();
        try {
            $res = $client->request($method, $url);
        } catch (Exception $e){
            logger($e->getMessage());
            return false;
        }
        $html = (string)$res->getBody()->getContents();
        $crawler = new Crawler($html);
        try{
            return $crawler->filter($cssSelector)->text();
        }catch(Exception $e){
            logger($e->getMessage());
            return false;
        }
    }

    /**
     * @param string $fname
     */
    public function load_json($fname = 'scenario')
    {
        $json = File::get('database/'.$fname.'.json');
        return json_decode($json);
    }

}
