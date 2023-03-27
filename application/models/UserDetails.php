<?php

 class UserDetails {
 
   private $firstName;
   private $lastName;
   private $emailId;
   
   private $bio;
 
   private $image;
 
  
   public function __construct(string $firstName, string $lastName, string $emailId, string $bio, string $image) {
     $this->firstName = $firstName;
     $this->lastName = $lastName;
     $this->emailId = $emailId;
     $this->bio = $bio;
     $this->image = $image;
 
     return $this;
 
   }
 
   public function getFirstName(): string {
     return $this->firstName;
   }
 
 
   public function getLastName(): string {
     return $this->lastName;
   }
 
   
   public function getEmail(): string {
     return $this->emailId;
   }
 
 
   public function getBiography(): string {
     return $this->bio;
   }
 
  
   public function image(): string {
     return $this->image;
   }
 }
 
 ?>
