<?php

namespace Blog\src\DAO;

use Blog\config\Parameter;
use Blog\src\model\User;


class UserDAO extends DAO
{
    private function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setRole($row['role']);
        $user->setStatus($row['status']);
        return $user;
    }

    public function register(Parameter $post, $token)
    {  
        $token;
        $role = 'user';
        $sql = 'INSERT INTO user (pseudo, password, mail, token, role, status) VALUES (:pseudo, :password, :mail, :token, :role, :status)';
        $this->createQuery($sql, 
        ['pseudo'=>$post->get('pseudo'),
         'password'=>password_hash($post->get('password'), PASSWORD_BCRYPT),
         'mail'=>$post->get('mail'),
         'token'=>$token,
         'role'=>$role,
         'status'=>0
         ]);
    } 

    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo = ?';
        $result = $this->createQuery($sql, [$post->get('pseudo')]);
        $isUnique = $result->fetchColumn();
        if($isUnique) {
            return '<p>Le pseudo existe déjà</p>';
        }  
    }

    public function checkMail(Parameter $post)
    {
        $sql = 'SELECT COUNT(mail) FROM user WHERE mail = ?';
        $result = $this->createQuery($sql, [$post->get('mail')]);
        $isUnique = $result->fetchColumn();
        if($isUnique) {
            return '<p>Votre mail est déja utiliser</p>';
        }  
    }

    public function validateAccount(Parameter $get)
    {
        $token = $get->get('token');
        $sql = "UPDATE user SET status = :status  WHERE token = :token";
        $this->createQuery($sql,
        [   'status'=>1,
            'token'=>$token
        ]);
      
    }

    public function login(Parameter $post)
    {
        $sql = 'SELECT * FROM user WHERE mail = ?';
        $data = $this->createQuery($sql, [$post->get('mail')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }

    public function updatePassword(Parameter $post, $mail)
    {
        $sql = 'UPDATE user SET password = :password WHERE mail = :mail';
        $this->createQuery($sql, [
            'password'=>password_hash($post->get('password'), PASSWORD_BCRYPT),
            'mail'=> $mail]);
    }

    public function checkMailToChangepass(Parameter $get)
    {
        $sql = 'SELECT COUNT(mail) FROM user WHERE mail = ?';
        $result = $this->createQuery($sql, [$get->get('mail')]);
        $isUnique = $result->fetchColumn();
        if($isUnique) {
            return $isUnique;
        }  
    }

    public function deleteAccount($mail)
    {
        $sql = 'DELETE FROM user WHERE mail = ?';
        $this->createQuery($sql, [$mail]);
    }

    public function getPseudo($userId)
    {
        $sql = 'SELECT pseudo FROM user WHERE id = :id';
        $result = $this->createQuery($sql, ['id'=>$userId]);
        $pseudo = $result->fetchColumn();
   
        return $pseudo;
    }

    public function getUsers()
    {
        $sql = 'SELECT user.id , user.pseudo, user.role, user.status FROM user ORDER BY id';
        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row){
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

    public function deleteUser($userId)
    {
        $sql = 'DELETE FROM user WHERE id = ?';
        $this->createQuery($sql, [$userId]);
    }

    public function changeRole($userId)
    {
        $sql = 'UPDATE user SET role = ? WHERE id = ?';
        $this->createQuery($sql, ['admin', $userId]);
    }
}