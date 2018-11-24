<?php
    class destaqueDAO{

        //Criei uma variavel chamada $requestFront
        //da qual por padrão (que eu optei) começa com false
        //ele será útil para fazer a chamada/requisição
        //das páginas que são iguais, PORTANTO
        //acabam sendo em caminhos diferentes
        public function __construct($requestFront = false){
            require_once('dataBase.php');
            //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/destaqueClass.php');
            @require_once($_SESSION['path'].'cms/models/destaqueClass.php');
        }

        public function selectAll(){
            $listContato = null;

            $sql = "SELECT destaque.id AS id_destaque,
            prato.id AS id_prato, 
            destaque.id_prato AS id_prato_destaque, 
            destaque.ativo AS destaque_ativo, 
            prato.ativo AS prato_ativo,
            prato.preco AS preco,  
            prato.titulo AS titulo, 
            categoria.titulo AS titulo_categoria, 
            foto_prato.foto AS imagem 
            FROM tbl_destaque AS destaque 
            INNER JOIN tbl_categoria AS categoria 
            INNER JOIN tbl_prato AS prato 
            INNER JOIN tbl_foto_prato AS foto_prato 
            WHERE prato.id = foto_prato.id_prato 
            AND prato.id = destaque.id_prato
            AND prato.id_categoria = categoria.id 
            ORDER BY destaque.id DESC;";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $count=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listContato[] = new Destaque();
                $listContato[$count]->id_destaque = $rs['id_destaque'];
                $listContato[$count]->id_prato = $rs['id_prato'];
                $listContato[$count]->id_prato_destaque = $rs['id_prato_destaque'];
                $listContato[$count]->destaque_ativo = $rs['destaque_ativo'];
                $listContato[$count]->prato_ativo = $rs['prato_ativo'];
                $listContato[$count]->preco = $rs['preco'];
                $listContato[$count]->titulo = $rs['titulo'];
                $listContato[$count]->titulo_categoria = $rs['titulo_categoria'];
                $listContato[$count]->imagem = $rs['imagem'];

                $count+=1;
            }

            return $listContato;
        }

        public function selectLastInsert(){
            $sql = "SELECT MAX(d.id) AS ultimo_inserido, d.id AS id_destaque, p.preco AS preco, d.id_prato AS id_prato_destaque, p.id AS id_prato, p.titulo AS titulo, pf.foto AS foto, p.resumo AS resumo FROM tbl_destaque AS d INNER JOIN tbl_prato AS p INNER JOIN tbl_foto_prato AS pf WHERE d.id_prato = p.id AND pf.id_prato = p.id;";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){

                $listDestaque = new Destaque();
                $listDestaque->ultimo_inserido = $rs['ultimo_inserido'];
                $listDestaque->id_destaque = $rs['id_destaque'];
                $listDestaque->id_prato_destaque = $rs['id_prato_destaque'];
                $listDestaque->id_prato = $rs['id_prato'];
                $listDestaque->preco = $rs['preco'];
                $listDestaque->titulo = $rs['titulo'];
                $listDestaque->foto = $rs['foto'];
                $listDestaque->resumo = $rs['resumo'];

                $conex = new mysql_db();
                $PDO_conex = $conex->conectar();
                if($PDO_conex->query($sql))
                    echo('');
                else
                    echo('Erro');

                $conex->desconectar();

                return $listDestaque;
            }
        }

        public function delete($id){
            $sql = "delete from tbl_fale_conosco where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:fale-conosco.php');
        }

        public function contador(){
            $rows = null;

            $sql="SELECT COUNT(*) AS total FROM tbl_fale_conosco;";

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();
            //Executa a query

            $select = $PDO_conex->query($sql);

            $count=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC)){
            //Cria um objeto array da classe Contato
                $rows[] = new Destaque();
                $rows[$count]->total = $rs['total'];
                $count+=1;
            }
            return $rows;
        }
    }
?>
