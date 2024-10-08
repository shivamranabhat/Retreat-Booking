<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Currency</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('currencies')}}" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor"><path  d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left"/></svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form  method="POST" action="{{ route('currency.store') }}">
                                @csrf
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="currency">Currency</label>
                                    <input type="text" name="currency" id="currency" class="form-control @error('currency') is-invalid @enderror {{ $errors->has('currency') ? 'error' : '' }}"
                                        value="{{ old('currency') }}" />
                                    @error('currency')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="symbol">Symbol</label>
                                    <input type="text" name="symbol" id="symbol" class="form-control @error('symbol') is-invalid @enderror {{ $errors->has('symbol') ? 'error' : '' }}"
                                        value="{{ old('symbol') }}" />
                                    @error('symbol')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="exchange_rate">Exchange Rate</label>
                                    <input type="text" name="exchange_rate" id="exchange_rate" class="form-control @error('exchange_rate') is-invalid @enderror {{ $errors->has('exchange_rate') ? 'error' : '' }}"
                                        value="{{ old('exchange_rate') }}" />
                                    @error('exchange_rate')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-4">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>