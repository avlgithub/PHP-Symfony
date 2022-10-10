<?php

    namespace App\Entity;

    // Usa "use Doctrine\ORM\Mapping" e definie como ORM para ser tulizada na anotação  @ORM\Entity()
    // Defiindo cada campo para ser tratado com o ORM
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity()
     */
    class Medico
    {
        /**
        * @ORM\Id
        * @ORM\GeneratedValue
        * @ORM\Column(type="integer") 
        */
        public string $id;
        /**
        * @ORM\Column(type="string")
        */
        public string $crm;
        /**
        * @ORM\Column(type="string")
        */
        public string $nome;
    }
?>