 @include('header')
 <main>
     <div class="container">
        <a href="/cards" class="btn btn-warning">Go back</a>
         <form method="POST">
             @csrf
             <hr>
             <div class="row">
                @if($errors->any())
                <div class="alert alert-danger">
                    <p>Something went wrong!</p>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                 <div class="col-md-6">
                     <div class="form-group">
                         <div class="form-col">
                             <label for="name" class="label-form">Card Name:</label>
                             <input type="text" name="name" class="form-control" required>
                         </div>
                         <p></p>
                         <div class="form-col">
                             <label for="condition" class="label-form">Card Condition:</label>
                             <select class="form-select" name="condition" required>
                                <option value="m">Mint</option>
                                <option value="nm">near mint</option>
                                <option value="sp">spreadly played</option>
                                <option value="mp">moderated played</option>
                                <option value="hp">heavily played</option>
                                <option value="d">damaged</option>
                            </select>
                        </div>
                         <p></p>
                         <div class="form-col">
                            <label for="quantity" class="label-form">Quantity:</label>
                            <input type="number" name="quantity" class="form-control" required>
                        </div>
                     </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-col">
                            <label for="mana" class="label-form">Converted Mana Cost</label>
                            <input type="number" name="CMC" class="form-control" required>
                        </div>
                        <div class="form-col">
                            <label for="color" class="form-label">Color:</label>
                            <select id="select" class="form-select" name="color" required>
                                <option value="r">red</option>
                                <option value="w">White</option>
                                <option value="u">blue</option>
                                <option value="b">black</option>
                                <option value="g">green</option>
                                <option value="c">wastes</option>
                                <option value="ur">izzet</option>
                                <option value="rw">boros</option>
                                <option value="uw">azorius</option>
                                <option value="bg">golgari</option>
                                <option value="ub">dimir</option>
                                <option value="ug">simic</option>
                                <option value="gw">selesnya</option>
                                <option value="gr">gruul</option>
                                <option value="br">rakdos</option>
                                <option value="bw">orzhov</option>
                                <option value="wug">bant</option>
                                <option value="urb">grixis</option>
                                <option value="rwb">mardu</option>
                                <option value="urw">jeskai</option>
                                <option value="wbg">abzan</option>
                                <option value="grw">naya</option>
                                <option value="wub">esper</option>
                                <option value="rug">temur</option>
                                <option value="bug">sultai</option>
                                <option value="brg">jund</option>
                               
                            </select>
                        </div>
                       <p></p>
                        <div class="form-col">
                            <label for="type" class="form-label">Card Type</label>
                            <select class="form-select" name="type" required>
                                <option value="land">Land</option>
                                <option value="creature">Creature</option>
                                <option value="instant">Instant</option>
                                <option value="sorcery">Sorcery</option>
                                <option value="enchantment">Enchantment</option>
                                <option value="artifact">Artifact</option>
                                <option value="planeswalker">Planeswalker</option>
                            </select>
                        </div>
                    </div>
                 </div>
             </div>
             {{-- <p></p> --}}

            <hr>
             <button class="btn btn-primary" type="submit">Add</button>
         </form>
     </div>
 </main>
 @include('footer')