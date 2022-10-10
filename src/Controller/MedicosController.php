<?php

namespace App\Controller;

use App\Entity\Medico;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class MedicosController
{
       /*
       *
       * Subir o servidor PHP com alvo na pasta public.
       * php -S localhost:8080 -t public
       * 
       * Necessário instalar o ORM com o comando abaixo:
       * composer require symfony/orm-pack
       *
       *
       * Util para listar comando instlado no symfony use na pasta raiz 
       * 'php bin\console list'
       * 
       * Irá retornar o que tem disponível de componemtes para utilização dno projeto. por exemplo:
       *  doctrine
              doctrine:cache:clear-collection-region  Clear a second-level cache collection region
              doctrine:cache:clear-entity-region      Clear a second-level cache entity region
              doctrine:cache:clear-metadata           Clears all metadata cache for an entity manager
              doctrine:cache:clear-query              Clears all query cache for an entity manager
              doctrine:cache:clear-query-region       Clear a second-level cache query region
              doctrine:cache:clear-result             Clears result cache for an entity manager
              doctrine:database:create                Creates the configured database



       * --- Para configuração do SQLLite utilize o arquivo ".env"
       *
       * no php.ini habilitar "extension=pdo_sqlite"
       * 
       * Após configurar o .env e o php.ini, rodar o comando para criar o banco via orm:
       * php bin\console doctrine:database:create
       *
       * -- Logo após o comando será criado o "data.db" no diretório "var"
       * 
       * -- Ajustar a ClassController para gerenciar as dependencias
       * 
       * 
       * -- Defina os campos na class modal com os e após execute o comando 
       * php bin\console doctrine:migrations:diff
       * 
       * Esse comando pega tas as classes mapeadas na pasta "Entity" e compara esse conteúdo com o banco de dados. 
       * Com base nessa diferença, ele cria um arquivo que pode fazer com que os dados mapeados sejam migrados para o banco, atualizando-o.
       * 
       * Após a execução, será gerada uma nova classe de migração dentro da pasta "Migrations". Vamos analisar o conteúdo dessa classe.
       */

       /**
       * @var EntityManagerInterface
       */
       private $entityManager;

       public function __construct(EntityManagerInterface $entityManager)
       {
              $this->entityManager =$entityManager;
       }


       /**
        * @Route("/medicos", methods={"POST"})
        */
       public function novo(Request $request):Response
       {

              $coporRequest = $request->getContent();

              $dadosParaJson = json_decode( $coporRequest ); 
              $medico = new Medico();
              $medico->crm = $dadosParaJson->crm;
              $medico->nome = $dadosParaJson->nome;

              // Observando o entidade
              $this->entityManager->persist( $medico );

              // Enviando as informações para o banco
              $this->entityManager->flush();


              return new JsonResponse( $medico );
       }
}