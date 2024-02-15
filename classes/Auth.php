<?php
    include "conexion.php";

    class Auth extends conexion {

        public function registrar($usuario, $email, $password){
            $conexion = parent::conectar();
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO t_usuarios (usuario, email, password) VALUES (?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sss', $usuario, $email, $hashed_password);
            return $query->execute();
        }

        public function correoExiste($email) {
            $conexion = parent::conectar();
            $sql = "SELECT COUNT(*) AS total FROM t_usuarios WHERE email = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('s', $email);
            $query->execute();
            $resultado = $query->get_result();
            $fila = $resultado->fetch_assoc();
    
            return $fila['total'] > 0; // Devuelve true si el correo ya existe, de lo contrario, devuelve false
        }

        public function logear($usuario, $password){
            $conexion = parent::conectar();
            $passwordExistente = "";
            $sql = "SELECT * FROM t_usuarios WHERE usuario = '$usuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $passwordExistente = mysqli_fetch_array($respuesta)['password'];
            
            if(password_verify($password, $passwordExistente)){
                $_SESSION['usuario'] = $usuario;
                return true;
            }else{
                return false;
            }

        }

        public function usuarioExiste($usuario) {
            $conexion = parent::conectar();
            $sql = "SELECT COUNT(*) AS total FROM t_usuarios WHERE usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('s', $usuario);
            $query->execute();
            $resultado = $query->get_result();
            $fila = $resultado->fetch_assoc();
    
            return $fila['total'] > 0; // Devuelve true si el correo ya existe, de lo contrario, devuelve false
        }

        private $secret_key = "tu_clave_secreta";  // Reemplaza con una clave secreta segura

        public function generarToken($usuario) {
            $token = [
                "iss" => "tu dominio",  // Emisor del token
                "aud" => "tu dominio",  // Audiencia a la que va dirigido
                "iat" => time(),        // Tiempo en que se emitió el token
                "exp" => time() + 60 * 60,  // Tiempo de expiración (1 hora, ajusta según tus necesidades)
                "data" => [
                "usuario" => $usuario,
                ],
            ];
            return JWT::encode($token, $this->secret_key);
        }

        public function verificarToken($token) {
            try {
                $decoded = JWT::decode($token, $this->secret_key, array('HS256'));
                return $decoded->data;
            } catch (Exception $e) {
                return null;
            }
        }

    }

?>