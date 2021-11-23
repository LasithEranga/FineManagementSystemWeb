
  <!--container div-->
  <div class="d-flex flex-column bg-dark text-white col-lg-12 h-auto" style="min-height: 100vh;">
    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand col-7" href="#">
          <h1 class="pt-2 px-3">REPORTS</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
          aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <select class="d-flex flex-row form-select form-select-sm bg-dark text-white me-2"
            aria-label=".form-select-sm example">
            <option selected value="expired">Expired</option>
            <option value="suedList">Sued List</option>
            <option value="pending">Pending</option>
            <option value="pending">Paid</option>
            <option value="allRecords">All Records</option>
          </select>
          <form class="d-flex col-8">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success me-3" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <div class=" d-flex   flex-row mt-1">
      <div class=" bg-dark  d-flex flex-column flex-md-row">
        <div class=" flex-row ms-4 mb-2">
          <label for="from">From:</label>
          <input type="date" class=" ms-1 me-2" id="from" name="from">
        </div>

        <div class=" flex-row ms-4 mb-2">
          <label for="from">To:</label>
          <input type="date" class=" ms-4 me-2" id="from" name="from">
        </div>

        <div class=" flex-row ms-3 ">
          <button type="button" class="btn btn-success px-4 ms-2  ">Go</button>

        </div>

      </div>
      <div class="d-flex flex-column  ms-auto me-3 flex-md-row">

        <button type="button" class="btn  btn-block btn-success px-4 mb-2 mb-md-0 me-md-2">Share</button>
        <button type="button" class="btn  btn-block btn-success px-4 me-md-2">Save as PDF</button>

      </div>


    </div>

    <!--table-->
    <div class="card text-white bg-light m-4">
      <div class="card-body table-responsive" style="height: 70vh;">">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Reference No</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">NIC</th>
              <th scope="col">License No</th>
              <th scope="col">Date</th>
              <th scope="col">Rules</th>
              <th scope="col">Fine Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>aaa</td>
              <td>25000</td>
              <td>aaa</td>
              <td>aaa</td>
              <td>25000</td>
              <td>aaa</td>
              <td>aaa</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>bbb</td>
              <td>5000</td>
              <td>bbb</td>
              <td>bbb</td>
              <td>5000</td>
              <td>bbb</td>
              <td>bbb</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>ccc</td>
              <td>30000</td>
              <td>ccc</td>
              <td>ccc</td>
              <td>30000</td>
              <td>ccc</td>
              <td>ccc</td>

            </tr>
            <tr>
              <th scope="row">4</th>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
            </tr>

            <tr>
              <th scope="row">4</th>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
              <td>1500</td>
              <td>ddd</td>
              <td>ddd</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>



  </div>




  <!--Script-->
  <!-- JavaScript Bundle with Popper -->
