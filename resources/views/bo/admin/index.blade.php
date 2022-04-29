@extends('layouts.admin-with-sidebar')

@section('content')
  <h1>The page's title</h1>
  <div class="container">
    <button type="button" class="btn btn-primary">Primary</button>
    <button type="button" class="btn btn-secondary">Secondary</button>
    <button type="button" class="btn btn-success">Success</button>
    <button type="button" class="btn btn-danger">Danger</button>
    <button type="button" class="btn btn-warning">Warning</button>
    <button type="button" class="btn btn-info">Info</button>
    <button type="button" class="btn btn-light">Light</button>
    <button type="button" class="btn btn-dark">Dark</button>
  </div>
  <div class="m-3"></div>
  <div class="container">
    <div class="alert alert-primary" role="alert">
      A simple primary alert—check it out!
    </div>
    <div class="alert alert-secondary" role="alert">
      A simple secondary alert—check it out!
    </div>
    <div class="alert alert-success" role="alert">
      A simple success alert—check it out!
    </div>
    <div class="alert alert-danger" role="alert">
      A simple danger alert—check it out!
    </div>
    <div class="alert alert-warning" role="alert">
      A simple warning alert—check it out!
    </div>
    <div class="alert alert-info" role="alert">
      A simple info alert—check it out!
    </div>
    <div class="alert alert-light" role="alert">
      A simple light alert—check it out!
    </div>
    <div class="alert alert-dark" role="alert">
      A simple dark alert—check it out!
    </div>
  </div>
  <div class="mt-3">
    <table id="table_id" class="display table table-striped">
        <thead>
            <tr> <th>Column 1</th> <th>Column 2</th> </tr>
        </thead>
        <tbody>
            <tr> <td>Row 1 Data 1</td> <td>Row 1 Data 2</td> </tr>
            <tr> <td>Row 2 Data 1</td> <td>Row 2 Data 2</td> </tr>
            <tr> <td>Row 2 Data 1</td> <td>Row 2 Data 2</td> </tr>
            <tr> <td>Row 2 Data 1</td> <td>Row 2 Data 2</td> </tr>
            <tr> <td>Row 2 Data 1</td> <td>Row 2 Data 2</td> </tr>
            <tr> <td>Row 2 Data 1</td> <td>Row 2 Data 2</td> </tr>
            <tr> <td>Row 2 Data 1</td> <td>Row 2 Data 2</td> </tr>
            <tr> <td>Row 2 Data 1</td> <td>Row 2 Data 2</td> </tr>
        </tbody>
    </table>
  </div>
  <div class="container mt-3"><hr></div>
  <div class="container mt-3">
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleName" class="form-label">Name</label>
        <input type="nam" class="form-control" id="exampleName">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <div class="mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Comments</label>
      </div>
      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Disabled input</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
      </div>
      <div class="mb-3">
        <select class="form-select" aria-label="Default select example">
          <option selected>Open this select menu</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

@endsection
