<?php

$arr = [
    'query' => [
        'filter' => [
            'bool' => [
                'match' => 10
            ]
        ]
    ]
];

class Query
{
    public function setFilter(){}

    public function setFilterFunc(): Query{}
}

class Filter
{
    public function setBoool(){}
}

class Boool
{
    public function setMatch(){}
}

class Match
{

}


$query = new Query();
$filter = new Filter();
$boool = new Boool();
$match = new Match();

$filter->setBoool($boool);
$query->setFilter($filter);


$query->setFilterFunc(function ($boool) {
})->setFilter();










class Term
{

}

class Clause
{
    /**
     * @var array
     */
    private $sub = [];

    /**
     * @param Term $term
     * @return Clause|static
     */
    public function setTerm(Term $term): Clause
    {
        $this->sub[] = $term;
        return $this;
    }

    /**
     * @param $class
     * @param callable $func
     * @return Clause
     */
    public function setWithFunc($class, callable $func): Clause
    {
        call_user_func(
            $func,
            $term = new $class()
        );
        return $this->setTerm($term);
    }
}

$clause = new Clause();

$clause->setWithFunc(Term::class, function (Term $clause) {

});