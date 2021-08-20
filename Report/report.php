
    <!--container div-->
    <div class="d-flex flex-column bg-dark text-white col-lg-12 h-auto" >
        <!--navigation bar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand col-7" href="#"><h1 class="pt-2 px-3">REPORTS</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <select class="d-flex flex-row form-select form-select-sm bg-dark text-white me-2" aria-label=".form-select-sm example">
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

        <!--date picker-->
        <div class="d-flex flex-row">
            <div class="col-5 d-flex flex-row">
                <div class="px-4 ms-1">
                    <label for="from">From:</label>
                    <input type="date" id="from" name="from">

                    <!-- <i class='text-white fas fa-calendar-alt'></i> -->
                </div>
    
                <div class="ps-3">
                    <label for="to">To:</label>
                    <input type="date" id="to" name="to"> 
                    <button type="button" class="btn btn-success px-3 ms-2">Go</button>
                </div>
            </div>
            
            <!--share & save button--> 
            <div class="d-flex flex-row-reverse  col-7 pe-4 mb-2">
              <div class="d-flex align-self-right bg-dark">
                <button type="button" class="btn btn-success px-3 me-2">Share</button>
                <button type="button" class="btn btn-success px-3">Save as PDF</button>
              </div> 
            </div>

            
    
        </div>
        
        <!--table-->
        <div class="card text-white bg-light m-4">
          <div class="card-body">      
            <table class="table table-striped">
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
                </tbody>
              </table>   
          </div>
        </div>

        

      </div>
    

    
    
    <!--Script-->
    <!-- JavaScript Bundle with Popper -->
</body>
</html>