<?php

namespace SolutionOne {

    function zipper(array $tab1, array $tab2): array {
        $tab_l = count($tab1);
        for($i=0; $i<$tab_l; $i++) {
            $result[] = [$tab1[$i], $tab2[$i]];
        }
        return $result;
    }
    
    var_dump(zipper(tab1 : [1,2,3], tab2: [4,5,6]));
}

namespace SolutionTwo {

    function zipper(array $tab1, array $tab2): array {
        $tab1_l = count($tab1);
        $tab2_l = count($tab2);
        $tab_l = ( $tab1_l > $tab2_l )?$tab1_l : $tab2_l;
        $result = [];
        for($i=0; $i<$tab_l; $i++) {
            $one = $tab1[$i]?? false;
            $two = $tab2[$i]?? '';
            $temp_tab = [];
            if ($tab1[$i]?? false) {
                $temp_tab[] = $one;
            }
            if ($tab2[$i]?? false) {
                $temp_tab[] = $two;
            }
            $result[] = $temp_tab;
        }
        return $result;
    }
    
    var_dump(zipper(tab1 : [1,2,3], tab2: [4,5,6,5]));
}
// [[1,4], [2,5], [3, 6]]