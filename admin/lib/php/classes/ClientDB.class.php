<?php

class ClientDB extends Client {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function addClient($data) {
        //$_db->beginTransaction();
        try {
              $query="insert into client ";
              $query.=" (nom,prenom,pseudo,mp)";
              $query.=" values (:nom,:prenom";
              $query.=":pseudo,:mp)";
          /*  $query = "select ajouter_client(:nom,:prenom,:mp,:pseudo,:id_c) as retour";/*ajouter client: methode????
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $data['nom']);
            $resultset->bindValue('prenom', $data['prenom1']);
            $resultset->bindValue(':mp', $data['mp']);
            $resultset->bindValue(':pseudo', $data['pseudo']);
            $resultset->bindValue(':id_c', $data['id_c']);
            $resultset->execute();
            $retour = $resultset->fetchColumn(0);
            return $retour;*/
        } catch (PDOException $e) {
            print "Echec de l'insertion " . $e->getMessage();
        }
        //$_db->commit();
    }

    public function getClient($email, $password) {
        $query = "select * from client where pseudo=:pseudo and mp=:mp";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':pseudo', $pseudo);
            $resultset->bindValue(':mp', $mp);

            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                // nous n'employerons pas d'objet, afin de faciliter la conversion en Json dans le
                //fichier ajax ajaxRechercheClient.php
                $_array[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_array;
    }
