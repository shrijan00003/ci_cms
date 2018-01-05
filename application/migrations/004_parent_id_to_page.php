<?php 
class Migration_Parent_id_to_page extends CI_Migration
{
	public function up(){
            $field=array(
            'parent_id'=>array(
            		'type'=>'INT',
	            	'constraint'=>11,
	            	'unsigned'=>TRUE,
	            	'default'=>0 
            		)); 
          $this->dbforge->add_column('pages',$field);
        }

        public function down()
        {
                $this->dbforge->drop_column('pages','parent_id');
        }
}