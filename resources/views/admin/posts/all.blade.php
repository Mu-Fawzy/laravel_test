@extends('layouts.admin.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Posts</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @if (isset($trash)) Trash @else All Posts @endif</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						@if (!isset($trash))
						<div class="pr-1 mb-3 mb-xl-0">
							<a href="{{ route('posts.trash') }}" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-delete"></i></a>
						</div>
						@endif
					</div>
			
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
			<!-- row opened -->
			@include('alerts.admin')
			<div class="row">
				<div class="col-xl-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<!-- Shopping Cart-->
							<div class="product-details table-responsive">
								<table class="table table-bordered table-hover mb-0">
									<thead>
										<tr>
											<th>ID</th>
											<th class="text-right">Title</th>
											<th>Active</th>
											<th>Views</th>
											<th>Author</th>
											<th>Comments</th>
											<th><a class="btn btn-sm btn-outline-danger" href="#">Actions</a></th>
										</tr>
									</thead>
									<tbody>
										@php
											$i = 0;
										@endphp
										@forelse ($posts as $post)
											<tr>
												<th scope="row" class="text-center text-lg text-medium">{{ ++$i }}</th>
												<td>
													<div class="media">
														<div class="card-aside-img">
															<img src="{{asset($post->image)}}" alt="{{ $post->title }}" class="h-60 w-60">
														</div>
														<div class="media-body">
															<div class="card-item-desc mt-0">
																<h6 class="font-weight-semibold mt-0 text-uppercase">{{ $post->title }}</h6>
																<p>{{ $post->description }}</p>
															</div>
														</div>
													</div>
												</td>
												<td class="text-center text-lg text-medium">{{ $post->active }}</td>
												<td class="text-center text-lg text-medium">{{ $post->views }}</td>
												<td class="text-center text-lg text-medium"><a href="{{ route('author.posts', $post->admin->id) }}">{{ $post->admin->name }}</a></td>
												<td class="text-center text-lg text-medium">{{ $post->comments->count() }}</td>
												<td class="text-center">
													@if (isset($trash))
														<form id="post-{{ $post->id }}" action="{{ route('posts.forcedelete', $post->id) }}" method="post">
													@else
														<form id="post-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="post">
															@method('DELETE')
													@endif
														@csrf
													</form>
													<a class="remove-from-cart" href="{{ route('posts.destroy', $post->id) }}" data-toggle="tooltip" title="{{ $post->title }}" data-original-title="Remove item"  onclick="event.preventDefault(); document.getElementById('post-{{ $post->id }}').submit();"><i class="fa fa-trash"></i></a>
													@if (isset($trash))
													<a class="remove-from-cart" href="{{ route('posts.restore', $post->id) }}" data-toggle="tooltip" title="" data-original-title="Restore item"><i class="fa fa-trash-restore" style="color:#0162e8;"></i></a>
													@endif
													<a class="remove-from-cart" href="{{ route('posts.edit', $post->id) }}" data-toggle="tooltip" title="" data-original-title="Edit item"><i class="fa fa-pencil-alt" style="color:#01c9e8;"></i></a>
													<a class="remove-from-cart" href="{{ route('website.posts.show', $post->slug) }}" data-toggle="tooltip" title="" data-original-title="Show item"><i class="fa fa-eye" style="color:#01c9e8;"></i></a>
												</td>
											</tr>
										@empty
											<tr>
												<td class="text-center text-lg text-medium" colspan="4">
													No Posts Yet!
												</td>
											</tr>
										@endforelse
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- row closed -->
		</div>
		<!-- Container closed -->
	</div>
	<!-- main-content closed -->
@endsection
@section('js')
@endsection