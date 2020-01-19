<?PHP
include('conexao.php');
class HandlerDataBase 
{
    
    public function selectFields($fields = "*",$tableName)
    {
        $mysqli_connection = $GLOBALS["mysqli_connection"];

        $table = "SELECT ".$fields." FROM ".$tableName."";
        $resultTable = mysqli_query($mysqli_connection, $table); 
        while($dataTable = $resultTable->fetch_assoc())
        {
            $arrayTableData[] = $dataTable;
        }
        return $arrayTableData;
    }

    public function update($tableName,$fields,$whereCondition)
    {
        $mysqli_connection = $GLOBALS["mysqli_connection"];
        $sql = "UPDATE " . $tableName . " SET ".$fields. " WHERE ". $whereCondition;

        if ($mysqli_connection->query($sql) === TRUE) {
            return "1";
        } else {
            return "Error updating record: " . $mysqli_connection->error;
        }
    }

    public function insertFields($tableName,$fields,$values)
    {
        $mysqli_connection = $GLOBALS["mysqli_connection"];
        $table = "INSERT INTO ".$tableName."(".$fields.")VALUES(".$values.")";
        if($mysqli_connection->query($table) === TRUE) 
        {
            return "1";
        }else 
        {
            return "Error: " . $table . "<br>" . $mysqli_connection->error;
        }
    }

    public function selectCountWhere($fields = "*",$tableName,$conditional)
    {
        $mysqli_connection = $GLOBALS["mysqli_connection"];
        $table = "SELECT count(".$fields.") AS total FROM ".$tableName." WHERE " . $conditional;
        $result = mysqli_query($mysqli_connection, $table);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function selectWhere($fields,$tableName,$conditional)
    {
        $arrayTableData = null;
        $mysqli_connection = $GLOBALS["mysqli_connection"];
        $table = "SELECT ".$fields." FROM ".$tableName ." WHERE " . $conditional;
        $resultTable = mysqli_query($mysqli_connection, $table); 
        while($dataTable = $resultTable->fetch_assoc())
        {
            $arrayTableData[] = $dataTable;
        }
       
        return $arrayTableData;
    }

    public function selectLastLineOfTable($fields,$tableName,$orderField)
    {
        $arrayTableData = null;
        $mysqli_connection = $GLOBALS["mysqli_connection"];
        $table = "SELECT ".$fields." FROM ".$tableName." ORDER BY ".$orderField." DESC LIMIT 1 ";
        $resultTable = mysqli_query($mysqli_connection, $table);
        while($dataTable = $resultTable->fetch_assoc()){
            $arrayTableData[] = $dataTable;
        }

        return $arrayTableData;
    }
    
}
/*$fields = "nome,empresa";
$classDb = new HandlerDataBase;
//$dt = $classDb->selectFields($fields,"cad_cliente");
//$up = $classDb->update("cad_cliente","nome = '"."novoCliente"."'","idcad_cliente = 2");
//echo $up;
$is = $classDb->insertFields("setor","nome_setor","novo setor");
echo $is;*/
//echo $dt['empresa'];
//print_r( $dt);
//var_dump($dt[0]);

/* foreach ($dt as $key => $value) 
{
   echo $empresa = $value["nome"];
}  */
?>