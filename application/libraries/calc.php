<?php
	class Calc
	{
	   function add($n=0,$m=0)
	   {
		return ($n+$m);
	   }
		
	   function sub($n=0,$m=0)
	   {
		if($n>$m)
			return ($n-$m);
		else
			return ($m-$n);
	   }
		
	   function mul($n=0,$m=0)
	   {
		return($n*$m);
	   }
		
	   function div($n=0,$m=0)
	   {
		if($n>$m)
			return ($n/$m);
		else
			return ($m/$n);
	   }
		
	   function rem($n=0,$m=0)
	   {
		return ($n%$m);
	   }
	}
?> 