<?php
require_once 'Database.php';

class Player extends Database
{
    protected $tableName = 'players';

    public function add($data)
    {

        if (!empty($data)) {
            $fields = $placholders = [];
            foreach ($data as $field => $value) {
                $fields[] = $field;
                $placholders[] = ":{$field}";
            }
        }

        $sql = "INSERT INTO {$this->tableName} (" . implode(',', $fields) . ") VALUES (" . implode(',', $placholders) . ")";
        $stmt = $this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $stmt->execute($data);
            $lastInsertedId = $this->conn->lastInsertId();
            $this->conn->commit();
            return $lastInsertedId;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $this->conn->rollback();
        }

    }

    public function update($data, $id)
    {
        if (!empty($data)) {
            $fields = "";
            $x = 1;
            $fieldsCount = count($data);
            foreach ($data as $field => $value) {
                $fields .= "{$field}=:{$field}";
                if ($x < $fieldsCount) {
                    $fields .= ",";
                }
                $x++;
            }
        }
        $sql = "UPDATE {$this->tableName} SET {$fields} WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $data['id'] = $id;
            $stmt->execute($data);
            $this->conn->commit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $this->conn->rollback();
        }

    }

    /**
     * function is used to get records
     * @param int $stmt
     * @param int @limit
     * @return array $results
     */

    public function getRows($start = 0, $limit = 6)
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY id ASC LIMIT {$start},{$limit}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {

            $results = [];
        }
        return $results;
    }

    public function deleteRow($id)
    {
        $sql = "DELETE FROM {$this->tableName}  WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute([':id' => $id]);
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }

    }

    public function getCount()
    {
        $sql = "SELECT count(*) as pcount FROM {$this->tableName}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['pcount'];
    }
    /**
     * function is used to get single record based on the column value
     * @param string $fileds
     * @param any $value
     * @return array $results
     */
    public function getRow($field, $value)
    {

        $sql = "SELECT * FROM {$this->tableName}  WHERE {$field}=:{$field}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":{$field}" => $value]);
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }

        return $result;
    }

    public function searchPlayer($searchText, $start = 0, $limit = 6)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE pname LIKE :search ORDER BY id ASC LIMIT {$start},{$limit}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':search' => "{$searchText}%"]);
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }

        return $results;
    }
    /**
     * funciton is used to upload file
     * @param array $file
     * @return string $newFileName
     */
    public function uploadPhoto($file)
    {
        if (!empty($file)) {
            $fileTempPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileNameCmps = explode('.', $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = $fileName;
            $allowedExtn = ["jpg", "png", "gif", "jpeg"];
            if (in_array($fileExtension, $allowedExtn)) {
                $uploadFileDir = getcwd().'/uploads/';
                $destFilePath = $uploadFileDir . $newFileName;
                if (move_uploaded_file($fileTempPath, $destFilePath)) {
                    return $newFileName;
                }
            }
        }
    }

    public function uploadDocument($file)
    {
        if (!empty($file)) {
            $fileTempPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileNameCmps = explode('.', $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = $fileName;
            $allowedExtn = ["pdf"];
            if (in_array($fileExtension, $allowedExtn)) {
                $uploadFileDir = getcwd() . '/documents/';
                $destFilePath = $uploadFileDir . $newFileName;
                if (move_uploaded_file($fileTempPath, $destFilePath)) {
                    return $newFileName;
                }
            }
        }
    }

}
