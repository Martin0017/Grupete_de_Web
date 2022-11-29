<?php

require $_SERVER['DOCUMENT_ROOT'] . '/mundialazo/server/vendor/autoload.php';

define('client', new MongoDB\Client(
    'mongodb+srv://grupete:grupete@el-grupete-de-web.8gwxfmc.mongodb.net/?retryWrites=true&w=majority'));

class MongoController
{

    public static function search_and_get($getDB, $getCollection, $parameter, $value)
    {
        $client = client;
        $collection = $client->selectCollection($getDB, $getCollection);
        $document = $collection->findOne([$parameter => $value]);
        $json = MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($document));
        $decode = json_decode($json);
        return $decode;
    }

    public static function search_flag($value)
    {
        $client = client;
        $collection = $client->selectCollection('Mundial-Qatar', 'Paises');
        $document = $collection->findOne(['name' => $value]);
        $json = MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($document));
        $decode = json_decode($json);
        return $decode->flag;
    }

    public static function set_data($getDB, $getCollection, $object)
    {
        $client = client;
        $collection = $client->selectCollection($getDB, $getCollection);
        $collection->insertOne([$object]);
    }

    public static function get_all($getDB, $getCollection, $parameter, $value)
    {
        $client = client;
        $collection = $client->selectCollection($getDB, $getCollection);
        $document = $collection->find([$parameter => $value]);
        return $document;
    }

    public static function get_match($team, $value)
    {
        $client = client;
        $collection = $client->selectCollection('Mundial-Qatar', 'Enfrentamientos');
        $document = $collection->find([$team => $value]);
        $records = iterator_to_array($document);
        array_walk(
            $records,
            function (&$record) {
                if (isset($record['subDoc'])) {
                    $record['subDoc'] = iterator_to_array($record['subDoc']);
                }
            }
        );
        return $records;
    }

    public static function set_data_repository($teama, $teamb, $scorea, $scoreb, $flaga, $flagb)
    {

        $client = client;
        $collection = $client->selectCollection('Mundial-Qatar', 'Enfrentamientos');
        $collection->insertOne([
            'team_a' => $teama,
            'team_b' => $teamb,
            'score_a' => $scorea,
            'score_b' => $scoreb,
            'flag_a' => $flaga,
            'flag_b' => $flagb,
        ]);
    }

    public static function create_user($user, $mail, $password)
    {
        $client = client;
        $collection = $client->selectCollection('Mundial-Qatar', 'Usuarios');
        $collection->insertOne([
            'user' => $user,
            'mail' => $mail,
            'password' => $password,
            'type' => 'user',
            'active' => true,
        ]);
    }

    public static function login($user, $password)
    {
        $client = client;
        $collection = $client->selectCollection('Mundial-Qatar', 'Usuarios');
        $document = $collection->findOne(['user' => $user,
            'password' => $password]);
        $json = MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($document));
        $decode = json_decode($json);
        return $decode;

    }

    public static function get_all_matchs()
    {
        $client = client;
        $collection = $client->selectCollection('Mundial-Qatar', 'Enfrentamientos');
        $document = $collection->find();
        $records = iterator_to_array($document);
        array_walk(
            $records,
            function (&$record) {
                if (isset($record['subDoc'])) {
                    $record['subDoc'] = iterator_to_array($record['subDoc']);
                }
            }
        );
        return $records;
    }

    public static function uptade_match($teama,$teamb,$scorea,$scoreb)
    {
        $client = client;
        $collection = $client->selectCollection('Mundial-Qatar', 'Enfrentamientos');
        $collection->updateMany(
            ['team_a' => $teama,
             'team_b' => $teamb],
            ['$set' => ['score_a' => $scorea, 'score_b' => $scoreb]]);
        
    }

    public static function set_login($is_login)
    {
        $client = client;
        $collection = $client->selectCollection('Users', 'IsLogin');
        $collection->updateMany(
            ['Id' => '123456789'],
            ['$set' => ['is_login' => $is_login]]);
    }

    public static function delete_match($teama, $teamb)
    {
        $client = client;
        $collection = $client->selectCollection('Mundial-Qatar', 'Enfrentamientos');
        $collection->deleteOne(["team_a" => $teama, "team_b" => $teamb]);
    }

}
