<?php
	if(isset($_POST)){
		$nomearquivo = $_FILES['fileimage']['name'];
		$tamanhoarquivo = round(($_FILES['fileimage']['size']/1024));
		$extensao = strrchr($nomearquivo, '.');
		$nome_foto = pathinfo($nomearquivo, PATHINFO_FILENAME);
		$upload_dir = "../../../assets/archives/propaganda/";
        $upload_dir_img = "../../assets/archives/propaganda/";
		$caminho_imagem = $upload_dir.$nomearquivo;
		$extensoes_permitidas = array('.png', '.jpg', '.jpeg', '.gif', '.svg');
		if(in_array($extensao, $extensoes_permitidas)){ //in_array(, o que quer buscar)
			if($tamanhoarquivo <= 5120){
				$arquivo_tmp = $_FILES['fileimage']['tmp_name'];
				if(move_uploaded_file($arquivo_tmp, $caminho_imagem)){
                    $caminho_imagem = $upload_dir_img .$nomearquivo;

					echo("<img src='".$caminho_imagem."' class='image-view'>");
					echo("<script>frmcadastro.txtfoto.value='$nomearquivo';</script>");
				}
			}else{
				$erro="o arquivo selecionado é excede o limite máximo de 5MB";
			}
		}else{
			echo ("extensão inválida");
		}
    }
?>
