<section id="subscribe-newsletter" class="">
    <div class="container">
        <div class="row mx-n5 bg-black-doff p-5 text-white rounded">
            <div class="col-lg-5 px-0">
                <h3>Subscribe Volans</h3>
                <p>
                    Daftarkan emailmu untuk mendapatkan soal dan 
                    pembahasan materi UTBK-SBMPTN secara gratis
                    dari Volans Education
                </p>
            </div>
            <form action="{{ route('subscribersstore') }}" 
            class="col-lg-7 px-0 form-inline-one-input">
                <input type="text" required name="email" 
                placeholder="Enter your mail" class="form-control-lg form-control" />
                <button type="submit" class="btn btn-warning">
                    Submit
                </button>
            </form>
        </div>
    </div>
</section>