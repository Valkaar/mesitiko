select 
a.area_id,
a.area_label,
m.municipality_label,
p.prefecture_label 
from area a 
join municipality m on a.area_municipality_id = m.municipality_id 
join prefecture p on m.municipality_prefecture_id = p.prefecture_id