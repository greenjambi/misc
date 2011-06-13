for i in `cat number.txt`; do 
	num=$i
	e=$((num%=2))
	if(("$e" == 0));then
		echo $i" - e "
	else
		echo $i" - o "
	fi
done
