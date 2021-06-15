<?php
    // SQL Functions
    function insert_elem($link, $table, $columns, $values) {
        $num_elems = sizeof($columns);
        $types = "";

        $data = 0;

        $sql = "INSERT INTO $table (";

        for ($i = 0; $i < $num_elems - 1; $i++) {
            $sql .= "$columns[$i], ";
        }

        $sql .= $columns[$num_elems - 1].") VALUES (";

        for ($i = 0; $i < $num_elems - 1; $i++) {
            $types .= substr(gettype($values[$i]), 0, 1);
            $sql .= "?, ";
        }

        $types .= substr(gettype($values[$num_elems - 1]), 0, 1);
        $sql .= "?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, $types, ...$values);

            $stmt->execute();
            $data = $stmt->store_result();

            mysqli_stmt_close($stmt);
        }

        return $data;
    }

    function find_elem($link, $table, $columns, $params) {
        $data = 0;
        $num_elems = sizeof($columns);

        $sql = "SELECT * FROM $table WHERE ";

        for ($i = 0; $i < $num_elems - 1; $i++) {
            $sql .= "$columns[$i] = ? AND ";
        }

        $sql .= $columns[$num_elems - 1]." = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            $types = "";
            for ($i = 0; $i < $num_elems; $i++) {
                $types .= substr(gettype($params[$i]), 0, 1);
            }

            mysqli_stmt_bind_param($stmt, $types, ...$params);

            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);

            mysqli_stmt_close($stmt);
        }

        return $data;
    }

    function find_with_or($link, $table, $columns, $params) {
        $data = 0;
        $num_elems = sizeof($columns);

        $sql = "SELECT * FROM $table WHERE ";

        for ($i = 0; $i < $num_elems - 1; $i++) {
            $sql .= "$columns[$i] = ? OR ";
        }

        $sql .= $columns[$num_elems - 1]." = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            $types = "";
            for ($i = 0; $i < $num_elems; $i++) {
                $types .= substr(gettype($params[$i]), 0, 1);
            }

            mysqli_stmt_bind_param($stmt, $types, ...$params);

            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);

            mysqli_stmt_close($stmt);
        }

        return $data;
    }

    function update_elem($link, $table, $columns, $values, $params, $param_values) {
        $data = 0;
        $num_elems = sizeof($columns);
        $num_params = sizeof($params);

        $sql = "UPDATE $table SET ";

        for ($i = 0; $i < $num_elems - 1; $i++) {
            $sql .= "$columns[$i] = ?, ";
        }

        $sql .= $columns[$num_elems - 1]." = ? WHERE ";

        for ($i = 0; $i < $num_params - 1; $i++) {
            $sql .= "$params[$i] = ? AND ";
        }

        $sql .= $params[$num_params - 1]." = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            $types = "";
            for ($i = 0; $i < $num_elems; $i++) {
                $types .= substr(gettype($values[$i]), 0, 1);
            }

            for ($i = 0; $i < $num_params; $i++) {
                $types .= substr(gettype($param_values[$i]), 0, 1);
            }

            $combined = array_merge($values, $param_values);
            mysqli_stmt_bind_param($stmt, $types, ...$combined);

            $stmt->execute();
            $data = $stmt->store_result();

            mysqli_stmt_close($stmt);
        }

        return $data;
    }

    function remove($link, $table, $columns, $parameters, $limit = -1) {
        $data = 0;
        $num_elems = sizeof($columns);

        $sql = "DELETE FROM  $table WHERE ";

        for ($i = 0; $i < $num_elems - 1; $i++) {
            $sql .= "$columns[$i] = ? AND ";
        }

        $sql .= $columns[$num_elems - 1]." = ?";

        if ($limit != -1) {
            $sql .= " LIMIT ".$limit;
        }

        if ($stmt = mysqli_prepare($link, $sql)) {
            $types = "";
            for ($i = 0; $i < $num_elems; $i++) {
                $types .= substr(gettype($parameters[$i]), 0, 1);
            }

            mysqli_stmt_bind_param($stmt, $types, ...$parameters);

            $stmt->execute();
            $data = $stmt->store_result();

            mysqli_stmt_close($stmt);
        }

        return $data;
    }