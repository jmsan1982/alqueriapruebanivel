<?php

class users{

	public static function findUser($usuario){

		//usuarios de la bbdd alqueriaforms
		//error_log('select * from usuarios where activo=1 and usuario="'.$usuario.'"');
		$query=db::singleton()->query('select * from usuarios where activo=1 and usuario="'.$usuario.'"');
		if($query) 
			return $query->fetch();
		else
			return false;
	}

	//comprobamos en la bbdd de alqueria si se esta logueando un entrenador
	public static function findEntrenadorAlqueria($usuario){
		$query=db_2::singleton()->query('select * from coaches where activo=1 and usuario="'.$usuario.'"');
		if($query) 
			return $query->fetch();
		else
			return false;
	}

	public static function findAllNenwsletter(){
		return db::singleton()->query('select * from newsletter')->fetchAll();
		
	}

	public static function newNenwsletter($email){

        $sql="insert into newsletter (email)
		values (:mail)";
        $query=db::singleton()->prepare($sql);
        
        if(!$query) {
			var_dump( db::singleton()->errorInfo ());
			die;
		}
        
		$datos=array(':mail'=>$email);
        
        if(!$query->execute($datos)){
			var_dump( $query->errorInfo ());
			die;
		} else {
			echo "<script text='javascript'> alert('Gracias por participar en nuestra newsletter, en breve recibirá noticias nuestras...');
			window.location.replace('index.php'); </script>";
			die;
		}
	}

	public static function findAllAdmins(){
		return db::singleton()->query('select * from usuarios where rol="admin"')->fetchAll();
		
	}

	public static function findAllPress(){
		return db::singleton()->query('select * from usuarios where rol="prensa"')->fetchAll();
		
	}

	public static function findAllPadres(){
		return db::singleton()->query('select * from usuarios where rol="padre"')->fetchAll();
		
	}

	public static function findAllCoaches(){
		return db::singleton()->query('select * from usuarios where rol="entrenador"')->fetchAll();
		
	}

	public static function findAllCoachesAdmins(){
		return db::singleton()->query('select * from usuarios where rol="entrenadoradmin"')->fetchAll();
		
	}

	public static function findId($usuario){
		$query=db::singleton()->query('select * from usuarios where usuario="'.$usuario.'"');
		if($query) 
			return $query->fetch();
		else
			return false;
		
	}

	public static function findAll(){
		return db::singleton()->query('select * from usuarios order by id_usuario')->fetchAll();
		
	}
	
	public static function find($id){
		$query=db::singleton()->query('select * from usuarios where id_usuario='.$id);
		if($query) 
			return $query->fetch();
		else
			return false;
		
	}
	
    public static function newUser($usuario,$contrasenya,$rol){

        $sql="insert into usuarios (usuario,contrasenya,rol)
		values (:user,:contra,:ro)";
        $query=db::singleton()->prepare($sql);
        
        if(!$query) {
			var_dump( db::singleton()->errorInfo ());
			die;
		}
        
		$datos=array(':user'=>$usuario,':contra'=>$contrasenya,':ro'=>$rol);
        
        if(!$query->execute($datos)){
			var_dump( $query->errorInfo ());
			die;
		} else {
			echo "<script text='javascript'> alert('El usuario se creó correctamente');
			window.location.replace('?r=back/usuarios'); </script>";
			die;
		}
    }

    public static function deleteUser($id){
        $sql="delete from usuarios where id_usuario=:id";
        $query=db::singleton()->prepare($sql);
         
        if(!$query) {
			var_dump( db::singleton()->errorInfo ());
			die;
		}
        $datos=array(':id'=> $id);
        if(!$x=$query->execute($datos)){
            echo $x."ss";
			var_dump( $query->errorInfo ());
			die;
		} else {
			echo "<script text='javascript'> alert('El usuario se eliminó correctamente');
			window.location.replace('?r=back/usuarios'); </script>";
			die;
		}
    }

    public static function updateUser($id_usuario,$usuario,$contrasenya){
        $sql="update usuarios set usuario=:usuarionuevo,contrasenya=:contrasenyanueva where id_usuario=:id";
        $query=db::singleton()->prepare($sql);
         
        if(!$query) {
			var_dump( db::singleton()->errorInfo ());
			die;
		}
        $datos=array(':id'=> $id_usuario,':usuarionuevo'=> $usuario,':contrasenyanueva'=> $contrasenya);
        if(!$query->execute($datos)){
			var_dump( db::singleton()->errorInfo ());
			die;
		} else {
			echo "<script text='javascript'> alert('El usuario se actualizó correctamente');
			window.location.replace('?r=back/usuarios'); </script>";
			die;
		}
    }    
	
	
	
}

?>