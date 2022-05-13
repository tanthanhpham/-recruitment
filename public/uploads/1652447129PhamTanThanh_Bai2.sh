MENU=("Cafe den" "Cafe da" "Cafe sua" "Cafe cao" "Ket thuc")
while :
do
for((i=1;i<=${#MENU[@]};i++))
	do
		echo "$i.${MENU[i-1]}"
	done
	echo "Ban chon uong thuoc nao (1-4)"
	read choice
	if(($choice==5))
	then
		echo "Bye"
		break
	fi
	echo "${MENU[choice-1]}"
done

