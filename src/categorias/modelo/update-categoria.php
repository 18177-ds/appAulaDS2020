<?php


include('../../banco/conexao.php');

if($conexao)
{

    $dados=array(
        'tipo'=>'info',
        'mensagem'=>'OPS, não foi possível obter uma conexão com o banco de dados, tente mais tarde...'
    );

}
else(

    $requestData=$_REQUEST;

    if(empty($requestData['nome']) || empty($requestData['ativo']))
    {

        $dados=array(

            'tipo'=>'info',
            'mensagem'=>'Existe(m) campo(s) obrigatório(s) vazio(s).'
        );

    }
    else
    {

        //requestData=array_map('utf8_decode', $requestData);

        $id=isset($requestData['idcategoria'])?$requestData['idcategoria']: '';

        $requestData['ativo']=$requestData['ativo']=="on"?"S":"N"

//$requestData['dataagora']=date('Y-d-m H:i:s', strtotime($requestData['dataagora]));

$date=date_create_from_format('d/m/Y H:i:s', $requestData['dataagora']);
$requestData['dataagora']=data_format($date, 'Y-m-d H:i:s');

$sqlComando="UPDATE categorias SET nome'$requestData['nome'], ativo='$requestData[ativo]', datamodificacao='$request WHERE idcategoria=$id ";

$resultado=mysqli_query($conexao, $sqlComando);

if($resultado)
{

    $dados=array(
        'tipo'=>'error',
        'mensagem'=>'Categoria alterada com sucesso.'
        
    );

}

