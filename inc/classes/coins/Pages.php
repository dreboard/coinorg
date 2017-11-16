<?php

class Pages
{

    public function __construct()
    {
        $this->db = DBConnect::getInstance();
    }

    /*	public function getCoinPage($value) {
            $pageResults = mysql_query('SELECT * FROM pages WHERE pageName = ' . $value);
            $row = mysql_fetch_array($pageResults, MYSQL_ASSOC);
            $this->pageID = $row['pageID'];
            $this->pageCategory = $row['pageCategory'];
            $this->pageSubCategory = $row['pageSubCategory'];
            $this->pageName = $row['pageName'];
            $this->pageText1 = $row['pageText1'];
            $this->pageText2 = $row['pageText2'];
            $this->dates = $row['dates'];

            return true;
        }*/
    public function getCoinPage($pageName)
    {
        $stmt = $this->db->dbhc->prepare("
            SELECT * FROM pages     
            WHERE pageName = :pageName
            LIMIT 1
        ");
        $stmt->execute([':pageName' => $pageName]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->pageID = $row['pageID'];
            $this->pageCategory = $row['pageCategory'];
            $this->pageSubCategory = $row['pageSubCategory'];
            $this->pageName = $row['pageName'];
            $this->dates = $row['dates'];
            $this->completeSet = $row['completeSet'];

        }
        return;
    }

    public function getPageName()
    {
        echo $this->pageName;
    }

    public function getPageCategory()
    {
        echo $this->pageCategory;
    }

    public function getPageDates()
    {
        return $this->dates;
    }

}//End Class
