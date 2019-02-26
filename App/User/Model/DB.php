<?php
class User_Model_DB
{
    private static $_users = [
        1 => [
            'id' => 1,
            'name' => 'Dima',
            'city' => 'SPb',
        ],
        2 => [
            'id' => 2,
            'name' => 'Dima',
            'city' => 'SPb',
        ]
    ];

    /**
     * @param int $id
     * @return null|User_Model_Base
     */
    public static function getModelById(int $id)
    {
        $userData = self::$_users[$id] ?? false;
        if (!$userData) {
            return null;
        }

        return new User_Model_Base($userData);
    }

    public static function saveUser(User_Model_Base $user)
    {
        $data = ['id' => $user->getId(), 'name' => $user->getName()];
        // соединяемся с БД и сохраняем массив в базу
    }
}