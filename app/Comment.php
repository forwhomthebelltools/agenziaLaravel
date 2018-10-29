<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Comment extends Model
{
	//per convenzione trova la tabella come plurale con -s
	//altrimenti possiamo forzare questo meccanismo
    protected $fillable = ['comment', 'product_id'];

    public function product()
    {
        return $this->belongsTo('App\Product');
        //this=questo commento, che appartiene al prodotto
        //poichè ho creato la foreign key, capisce come collegare le due tabelle
    }

}
