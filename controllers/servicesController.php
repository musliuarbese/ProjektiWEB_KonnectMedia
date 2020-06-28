<?php

include ('C:/xampp/htdocs/ProjektiWeb_ArbeseMusliu/config/database.php');

class servicesController
{
   protected $db;

    public function __construct()
    {
       $this->db = new database;
    }

    public function all()
    {
       $query = $this->db->pdo->prepare('SELECT * FROM services');
       $query->execute();
       $result= $query->fetchAll();
      // print_r($result);
      
      foreach($result as $row){
        $services_id=$row['services_id']; 
        $tile =$row['title'];
        $icon=$row['icon'];
        $content=$row['content'];
         ?>
      <form action="" class="form-contact" method="post" onsubmit = "">

     <div class="holder"> 
        <br><br><label for="title">Title: <span class="green"></span></label> 
        <input name="title" id="title" value='<?php echo $title; ?>'></input>
      </div>
      <div class="holder"> 
        <br><br><label for="icon">Icon: <span class="green"></span></label> 
        <input name="icon" id="icon" value='<?php echo $icon; ?>'></input>
      </div>
      <div class="holder"> 
        <br><br><label for="content">Message: <span class="green"></span></label>
        <textarea rows="10" cols="10" name="content" id="content"><?php echo $content; ?></textarea>
      </div>
      
       <input type="submit"  value="=>SWAP FOR MORE=>" class="Butoni" onclick=""/>
    </form>


         <?php
      }
     
    }
    
    public function store($request)
    {
        
        $query = $this->db->pdo->prepare('INSERT INTO services(title, icon, content)
        VALUES (:title, :icon, :content)');
        $query->bindParam(':title', $request['title']);
        $query->bindParam(':icon', $request['icon']);
        $query->bindParam(':content', $request['content']);
        $query->execute();
        return header('Location: services.php');
    }
    public function edit($services_id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM services WHERE services_id = :services_id');
        $query->execute(['services_id' => $services_id]);
        return $query->fetch();
    }
    public function update($services_id, $request)
    {
        $query = $this->db->pdo->prepare('UPDATE services SET title = :title, icon = :icon, content = :content WHERE services_id = :services_id');
        $query->execute([
            'title' => $request['title'],
            'icon' => $request['icon'],
            'content' => $request['title'],
            'services_id' => $request['services_id']
        ]);
    }
    public function destroy($services_id)
    {
        $query = $this->db->pdo->prepare('DELETE from services WHERE services_id = :services_id');
        $query->execute(['services_id' => $services_id]);
      // return header('Location: deleteContact.php');
    }
}
?>


