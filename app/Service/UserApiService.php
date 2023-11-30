<?php

class UserApiService {
    private $apiUrl = 'https://my.api.mockaroo.com/users.json?key=7947cb40';

    public function get_users() {
        try {
            $context = stream_context_create([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
            ]);

            $apiResponse = file_get_contents($this->apiUrl, false, $context);
            $users = json_decode($apiResponse, false);
    
            if ($users == null && json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Error decoding JSON');
            }
            if (is_array($users)) {
                return $users;
            }

        } catch (\Throwable $th) {
            error_log('Error at UserApiService: ' . $th->getMessage());
            return [];
        }
    }


}