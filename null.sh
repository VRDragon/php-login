for i in {0..15}
do
    gpio mode $i out
    gpio write $i 0
done
