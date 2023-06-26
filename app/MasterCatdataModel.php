<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class MasterCatdataModel extends Model

{

    protected $table='master_catdata';

    protected $primaryKey='id';

    protected $fillable=['name','type','type_id','role'];

}

