<?php

class chat Extends basemodel
{
	public  function getPost()
	{
	  	$post=postTable::getPostById($this->post);
		return $post;
	}

	public function getEmetteur()
	{
		return utilisateurTable::getUserByID($this->emetteur);
	}
}