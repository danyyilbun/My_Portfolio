<?php
class order_item{
	private $id_static_get;
	private $sel_item_id;
	private $sel_item_title;
	private $sel_item_desc;
	private $sel_item_price;	
	private $sel_item_size;
	private $sel_item_qty;
	private $sel_item_color;
	private $date_added;
	
	
	function __construct($id, $title, $desc, $price, $size, $qty, $color, $added,$current_id)
	{
		$this->id_static_get = $current_id + 1;
		$this->sel_item_id = $id;
		$this->sel_item_title = $title;
		$this->sel_item_desc = $desc;
		$this->sel_item_price = $price;
		$this->sel_item_size = $size;
		$this->sel_item_qty = $qty;
		$this->sel_item_color = $color;
 		$this->date_added = $added;
		
	}
	public function get_id_static() 
	{ 
		return $this->id_static_get; 
	}
	public function get_id()
	{
		return $this->sel_item_id;
	}
	public function get_price()
	{
		return $this->sel_item_price;
	}
	public function get_title()
	{
		return $this->sel_item_title;
	}
	public function get_desc()
	{
		return $this->sel_item_desc;
	}
	public function get_size()
	{
		return $this->sel_item_size;
	}
	public function get_qty()
	{
		return $this->sel_item_qty;
	}
	public function get_color()
	{
		return $this->sel_item_color;
	}
	public function get_added()
	{
		return $this->date_added;
	}
	public function get_cost()
	{
		return $this->sel_item_price * $this->sel_item_qty;
	}
	
	
}



?>