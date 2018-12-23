<?php

class message extends basemodel
{
	public  function getPost(){
		$res=postTable::getPostbyId($this->post);
		return $res;
		}
		
	public function getParent(){
		return utilisateurTable::getUserById($this->parent);
		}
	
	public function getLikes(){
		return $this->aime;
		}
	public function getId(){
		return $this->id;
		}
	public function getDestinataire(){
		return utilisateurTable::getUserById($this->destinataire);
		}
	public function getEmetteur()
	{
		return utilisateurTable::getUserByID($this->emetteur);
		}
	
}
