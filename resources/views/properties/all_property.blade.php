@extends('layouts.app')

@section('content')

<div class="dashboard__main pl0-md">
  <div class="dashboard__content property-page bgc-f7">
    <div class="row align-items-center pb40">
      <div class="col-md-4">
        <div class="dashboard_title_area">
          <h2>All Properties</h2>
          <p class="text">We are glad to see you again!</p>
        </div>
      </div>
      <div class="col-md-8">
        <div class="dashboard_search_meta d-md-flex align-items-center justify-content-xxl-end">
          <div class="item1 mb15-sm">
            <div class="search_area">
              <input type="text" class="form-control bdrs12" placeholder="Search">
              <label><span class="flaticon-search"></span></label>
            </div>
          </div>
          <div class="page_control_shorting bdr1 bdrs12 py-2 ps-3 pe-2 mx-1 mx-xxl-3 bgc-white mb15-sm maxw140">
            <div class="pcs_dropdown d-flex align-items-center"><span class="title-color">Filter by:</span>
                  <select class="selectpicker show-tick">
                  <option>Sale</option>
                  <option>Rent</option>
                </select>
            </div>
          </div>
          <a href="{{ route('add_property') }}" class="ud-btn btn-thm">Add New Property<i class="fal fa-arrow-right-long"></i></a>
        </div>
      </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
    <div class="row">
      <div class="col-xl-12">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
          <div class="packages_table table-responsive">
            <table class="table-style3 table at-savesearch">
              <thead class="t-head">
                <tr>
                  <th scope="col">Listing info</th>
                  <th scope="col">Category</th>
                  <th scope="col">Date Published</th>
                  <th scope="col">Status</th>
                  <th scope="col">View</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="t-body">



                @foreach ($properties as $property)
                <tr>
                  <th scope="row">
                    <div class="listing-style1 dashboard-style d-xxl-flex align-items-center mb-0">
                      <div class="list-thumb">
                        <img class="w-100" src="{{ asset('https://bazhouse.com/portal/storage/app/public/property_imgs/' . $property->main_image) }}" alt="img">
                      </div>
                      <div class="list-content py-0 p-0 mt-2 mt-xxl-0 ps-xxl-4">
                        <div class="h6 list-title"><a href="../../property.php?id={{$property->id}}">{{ $property->title }}</a></div>
                        <p class="list-text mb-0">{{ $property->address_1 }}, {{ $property->city }}, {{ $property->state }}</p>
                        <div class="list-price"><a href="">{{ $property->price }}<span>/mo</span></a></div>
                      </div>
                    </div>
                  </th>


                  <td class="vam"><span class="pending-style style2">
                      @php
                      $properties_list_in = DB::table('properties_list_in')->where('properties_id', $property->id)->get();
                      @endphp

                      @foreach ($properties_list_in as $prope)
                      @php
                      $properties_list = DB::table('p_listing_type')->where('id', $prope->list_in_id)->first();
                      @endphp

                      {{ $properties_list->listing_type }}
                      @endforeach
                    </span></td>

                  <td class="vam">{{ $property->creation_date }}</td>
                  <td class="vam"><span class="pending-style style1">{{$property ->status}}</span></td>
                  <td class="vam">{{ $property->views	 }}</td>
                  <td class="vam">
                    <div class="d-flex">
                      <a href="{{ route('edit_property', $property->id) }}" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit" aria-label="Edit"><span class="fas fa-pen fa"></span></a>
                      <a href="{{ route('delete_property', $property->id) }}" class="icon delete-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete" aria-label="Delete"><span class="flaticon-bin"></span></a>
                    </div>
                  </td>
                </tr>
                @endforeach


              </tbody>
            </table>
            <div class="mbp_pagination text-center mt30 d-flex justify-content-center">
              {{ $properties->links() }}
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('scripts')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
  jQuery(document).ready(function() {
    jQuery('#uploadFile').filemanager('file');
  })
</script>
@endpush
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('.delete-btn').click(function() {
      var id = $(this).data('id');
      // console.log("hello");
      event.preventDefault(); // Prevent the default anchor tag behavior
      const url = $(this).attr('href');

      Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to delete this item',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3f6ad8',
        cancelButtonColor: '#d92550',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
          Swal.fire(
            'Deleted!',
            'Your item has been deleted.',
            'success'
          );
        }
      });


    });
  });
</script>