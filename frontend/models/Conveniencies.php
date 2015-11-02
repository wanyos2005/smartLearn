<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Conveniencies is to be used to perform any convenient operations whatsoever that may be desired along this project development
 */
class Conveniencies extends Model {

    const asc = true;
    const desc = false;
    const unknown = 'Unknown';
    //subject groups refer to app/config/subjects
    const allSubjects = 'allSubjects';
    const languages = 'lang';
    const sciences = 'scns';
    const humanities = 'hmnt';
    const technicals = 'tech';
    //privileges refer to app/config/privileges
    const student = 'student';
    const institution = 'institution';
    const trainer = 'trainer';
    const wess = 'we@ss';
    //genders
    const male = 'Male';
    const female = 'Female';

    /**
     * 
     * @return array genders
     */
    public static function genders() {
        return [self::male => self::male, self::female => self::female];
    }

    /**
     * 
     * @param integer | string $start first value
     * @param integer | string $end last value
     * @param bool $ascDesc true - ascending, else descending
     * @return array values between and including `$start` and `$end` in desired order
     */
    public function valueRanges($start, $end, $ascDesc) {
        foreach (self::arraySort(range($start, $end), $ascDesc) as $value)
            $values[$value] = $value;

        return $values;
    }

    /**
     * 
     * @param string $fname first name
     * @param string $mname middle name
     * @param string $lname last name
     * @return string name
     */
    public static function names($fname, $mname, $lname) {
        foreach ([$fname, $mname, $lname] as $name)
            if (!empty($name))
                if (empty($names))
                    $names = self::capitalizeFirstLetter($name);
                else
                    $names = "$names " . self::capitalizeFirstLetter($name);

        return $names;
    }

    /**
     * 
     * @param string $string
     * @return string
     */
    public static function capitalizeFirstLetter($string) {
        return ucfirst(strtolower($string));
    }

    /**
     * 
     * @param array $array an array
     * @param bool $ascDesc true - ascending, else descending
     * @return array | false array sorted appropriately
     */
    public static function arraySort($array, $ascDesc) {
        if (is_array($array)) {
            if ($ascDesc === self::asc)
                asort($array);
            else
                rsort($array);

            return $array;
        }
    }

    /**
     * 
     * @return array courseTypes
     */
    public static function courseTypes() {
        return self::arraySort(\Yii::$app->params['courseTypes'], self::asc);
    }

    /**
     * 
     * @return array grades
     */
    public static function gradesForDropDown() {
        foreach (\Yii::$app->params['grades'] as $grade => $name)
            $grades[$grade] = $name[0];

        return $grades;
    }

    /**
     * 
     * @param string $grade grade
     * @return string name of grade
     */
    public function nameOfGrade($grade) {
        return empty(\Yii::$app->params['grades'][$grade][0]) ? self::unknown : \Yii::$app->params['grades'][$grade][0];
    }

    /**
     * 
     * @param string $grade grade
     * @return integer points for grade
     */
    public function pointsOfGrade($grade) {
        return empty(\Yii::$app->params['grades'][$grade][1]) ? 0 : \Yii::$app->params['grades'][$grade][1];
    }

    /**
     * 
     * @param type $param
     * @return array subject categories
     */
    public static function subjectCategories() {
        foreach (\Yii::$app->params['subjects'] as $category => $catName)
            $cats[$category] = $category;

        return self::arraySort($cats, self::asc);
    }

    /**
     * 
     * @param string $category category in which a subject may fall
     * @return array subjects in the selected category
     */
    public static function subjectsForDropDown($category) {
        return self::arraySort(self::subjectsInACategory($category), self::asc);
    }

    /**
     * 
     * @param string $symbol symbol for subject
     * @return string subject category symbol
     */
    public static function subjectCategorySymbol($symbol) {
        foreach (\Yii::$app->params['subjects'] as $category => $catName)
            foreach ($catName as $subjects)
                foreach ($subjects as $symb => $subjectName)
                    if ($symb == $symbol)
                        return $category;

        return self::unknown;
    }

    /**
     * 
     * @param string $symbol symbol for subject
     * @return string subject category name
     */
    public static function subjectCategoryName($symbol) {
        return self::categoryName(self::subjectCategorySymbol($symbol));
    }

    /**
     * 
     * @param string $category category in which a subject may fall
     * @return string name of category
     */
    public static function categoryName($category) {
        foreach (\Yii::$app->params['subjects'][$category] as $catName => $subjects)
            return $catName;

        return self::unknown;
    }

    /**
     * 
     * @param string $category category in which a subject may fall
     * @return array subjects in the selected category
     */
    public static function subjectsInACategory($category) {
        foreach (\Yii::$app->params['subjects'] as $cat => $catName)
            if ($category == self::allSubjects || $cat == $category)
                foreach ($catName as $subjects)
                    foreach ($subjects as $symbol => $subjectName)
                        $subjectsArray[$symbol] = $subjectName;

        return isset($subjectsArray) ? self::arraySort($subjectsArray, self::asc) : [];
    }

    /**
     * 
     * @param string $symbol symbol for subject
     * @return string subject name
     */
    public static function subjectName($symbol) {
        foreach (\Yii::$app->params['subjects'] as $catName)
            foreach ($catName as $subjects)
                foreach ($subjects as $symb => $subjectName)
                    if ($symb == $symbol)
                        return $subjectName;

        return self::unknown;
    }

    /**
     * 
     * @param string $privilege a privilege for user
     * @return array corresponding details
     */
    public function privileges($privilege) {
        return empty(\Yii::$app->params['privileges'][$privilege]) ? [] : [$privilege => \Yii::$app->params['privileges'][$privilege]];
    }

    /**
     * 
     * @param array $models array of models
     * @param string $key attribute of model, probably id
     * @param string $value another attribute of model
     * @param string $group another attribute of model
     * @return array if group is empty [key1 => value1, key2 => value2, key3 => value3, ] else [group1 => [key1 => value1, key2 => value2], group2 => [key3 => value3], ]
     */
    public function modelsToArray($models, $key, $value, $group) {
        return ArrayHelper::map($models, $key, $value, empty($group) ? null : $group);
    }

    /**
     * populate a dropdown using given array
     * 
     * @param array $array simple or associative array
     * @param string $prompt prompt
     */
    public function populateDropDown($array, $prompt) {
        if (!is_null($prompt))
            echo "<option value=''>-- $prompt --</option>";

        foreach ($array as $key => $value)
            echo "<option value='$key'>$value</option>";
    }

}
