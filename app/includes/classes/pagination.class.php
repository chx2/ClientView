<?php
class Paginator extends Client {

  /*
    Pagination Class

    Used to generate pagination links
    Defaults to 10 per page
  */

  protected $limit;
  protected $offset;
  protected $records;
  protected $pages;
  protected $page;

  public function __construct($records, $limit = 10) {
    parent::__construct(false);
    $this->limit = $limit;
    $this->records = $records;
    $this->page =  ($this->pages > 1) ? $this->pages : 1;
    $this->pages = ceil($this->page / $this->limit);
  }

  //Return data on offset number of users
  public function getAll() {
    return $this->db->query('SELECT * FROM client ORDER BY name LIMIT '.$this->limit.' OFFSET '.$this->offset)->fetchAll();
  }

  //Return data for one user
  public function getUser($id) {
    return $this->db->query('SELECT * FROM client WHERE id = ?',$id)->fetchArray();
  }

  //Items to list
  public function limit() {
    return $this->limit;
  }

  // Calculate the offset for the query
  public function offset() {
    $this->offset = ($this->page - 1)  * $this->limit;
    return $this;
  }

  //Generate HTML
  public function paginate() {
    $prevlink = ($this->page > 1) ? '<li><a href="?page=1" title="First page"><i class="material-icons">first_page</i></a><a href="?page=' . ($this->page - 1) . '" title="Previous page"><i class="material-icons">chevron_left</i></a></li>' : '<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>';
    $nextlink = ($this->page < $this->pages) ? '<li><a href="?page=' . ($this->page + 1) . '" title="Next page"><i class="material-icons">chevron_right</i></a><a href="?page=' . $this->pages . '" title="Last page"><i class="material-icons">last_page</i></a></li>' : '<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>';
    $pagination = '<ul class="pagination center-align">'.$prevlink.' '.$this->page.' of '.$this->pages.' '.$nextlink;
    return $pagination;
  }

}
