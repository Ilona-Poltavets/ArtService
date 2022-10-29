<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LiteratureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('literatures')->insert([
            'title' => Str::random(10),
            'text' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec est
                ac felis laoreet efficitur. Phasellus egestas luctus sem ac ultricies. Praesent ornare, enim vel mollis
                faucibus, quam purus fermentum nisl, et porta orci mi eu quam. Curabitur quis diam quis leo sodales
                hendrerit et a diam. Vestibulum interdum quis est quis semper. Ut imperdiet aliquet ultrices. Quisque
                semper nibh nulla, vitae imperdiet mi gravida a. Curabitur varius molestie sapien vel faucibus. Integer
                vestibulum nisl eu commodo tempus. Curabitur fermentum ex ut odio eleifend pellentesque. Pellentesque
                pellentesque enim non leo suscipit scelerisque. In quis ipsum ipsum. Nulla vel neque vitae magna
                fermentum sagittis at vel velit.
                Quisque non diam a lectus dapibus venenatis non et mauris. Aliquam feugiat, sem sed sodales scelerisque,
                dui justo cursus ex, non vehicula leo elit a turpis. Donec accumsan augue nunc, at mollis tortor posuere
                in. Integer tempus urna dolor, id blandit tortor mattis id. Sed at ullamcorper enim. Nulla nibh felis,
                pulvinar at urna ac, dignissim faucibus nibh. Donec ut lobortis ipsum, vitae ultricies justo. Donec
                imperdiet libero sit amet tortor laoreet lobortis. Proin porttitor augue eu tristique tincidunt. Nulla
                scelerisque ut sem nec tristique. Suspendisse bibendum est et sapien molestie dictum. In consectetur
                urna a purus lobortis, ut imperdiet mi consequat. Integer vitae ante luctus, egestas orci sit amet,
                laoreet risus. Donec sed eleifend quam, at varius lorem. Donec condimentum nibh a diam eleifend feugiat.
                In hac habitasse platea dictumst. Aliquam semper, mauris quis varius pharetra, magna dolor sodales
                lorem, a dignissim lectus odio quis lacus. Aliquam ultricies tellus lacinia ante consectetur, vitae
                dapibus purus rutrum. Nam at feugiat leo, eget venenatis ante. Nam elit arcu, viverra eu mollis eget,
                venenatis vitae leo. Phasellus sit amet iaculis orci. Proin laoreet fermentum tortor non fringilla.
                Nulla odio mauris, luctus ut dignissim lacinia, eleifend ac diam. Etiam quis risus in erat aliquet
                varius non nec lacus. Duis nec fringilla metus, in consequat orci. Integer ut ullamcorper nulla. Quisque
                ipsum orci, vehicula a ante id, lacinia vestibulum erat. Etiam eget egestas tellus, at semper orci.
                Vestibulum id arcu sodales, sagittis nibh nec, mollis elit. Pellentesque vestibulum nibh nec dolor
                feugiat, ac lacinia arcu tempus. Vestibulum gravida, tellus sed volutpat lacinia, eros nibh semper
                lectus, sit amet venenatis lorem lacus vel enim. Orci varius natoque penatibus et magnis dis parturient
                montes, nascetur ridiculus mus. Quisque pharetra auctor eros quis commodo.
                Nunc id urna ut lectus pharetra dictum. Aliquam ullamcorper pretium arcu ut congue. Aenean in velit sem.
                Nulla tincidunt ex vitae ante egestas iaculis. Sed in iaculis neque. Nulla quis tempor ante, ac pharetra
                tellus. Donec varius lectus quis molestie gravida. Maecenas non ante sit amet metus congue consectetur
                nec vitae est. Aliquam erat volutpat.",
        ]);
        DB::table('literatures')->insert([
            'title' => Str::random(10),
            'text' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec est
                ac felis laoreet efficitur. Phasellus egestas luctus sem ac ultricies. Praesent ornare, enim vel mollis
                faucibus, quam purus fermentum nisl, et porta orci mi eu quam. Curabitur quis diam quis leo sodales
                hendrerit et a diam. Vestibulum interdum quis est quis semper. Ut imperdiet aliquet ultrices. Quisque
                semper nibh nulla, vitae imperdiet mi gravida a. Curabitur varius molestie sapien vel faucibus. Integer
                vestibulum nisl eu commodo tempus. Curabitur fermentum ex ut odio eleifend pellentesque. Pellentesque
                pellentesque enim non leo suscipit scelerisque. In quis ipsum ipsum. Nulla vel neque vitae magna
                fermentum sagittis at vel velit.
                Quisque non diam a lectus dapibus venenatis non et mauris. Aliquam feugiat, sem sed sodales scelerisque,
                dui justo cursus ex, non vehicula leo elit a turpis. Donec accumsan augue nunc, at mollis tortor posuere
                in. Integer tempus urna dolor, id blandit tortor mattis id. Sed at ullamcorper enim. Nulla nibh felis,
                pulvinar at urna ac, dignissim faucibus nibh. Donec ut lobortis ipsum, vitae ultricies justo. Donec
                imperdiet libero sit amet tortor laoreet lobortis. Proin porttitor augue eu tristique tincidunt. Nulla
                scelerisque ut sem nec tristique. Suspendisse bibendum est et sapien molestie dictum. In consectetur
                urna a purus lobortis, ut imperdiet mi consequat. Integer vitae ante luctus, egestas orci sit amet,
                laoreet risus. Donec sed eleifend quam, at varius lorem. Donec condimentum nibh a diam eleifend feugiat.
                In hac habitasse platea dictumst. Aliquam semper, mauris quis varius pharetra, magna dolor sodales
                lorem, a dignissim lectus odio quis lacus. Aliquam ultricies tellus lacinia ante consectetur, vitae
                dapibus purus rutrum. Nam at feugiat leo, eget venenatis ante. Nam elit arcu, viverra eu mollis eget,
                venenatis vitae leo. Phasellus sit amet iaculis orci. Proin laoreet fermentum tortor non fringilla.
                Nulla odio mauris, luctus ut dignissim lacinia, eleifend ac diam. Etiam quis risus in erat aliquet
                varius non nec lacus. Duis nec fringilla metus, in consequat orci. Integer ut ullamcorper nulla. Quisque
                ipsum orci, vehicula a ante id, lacinia vestibulum erat. Etiam eget egestas tellus, at semper orci.
                Vestibulum id arcu sodales, sagittis nibh nec, mollis elit. Pellentesque vestibulum nibh nec dolor
                feugiat, ac lacinia arcu tempus. Vestibulum gravida, tellus sed volutpat lacinia, eros nibh semper
                lectus, sit amet venenatis lorem lacus vel enim. Orci varius natoque penatibus et magnis dis parturient
                montes, nascetur ridiculus mus. Quisque pharetra auctor eros quis commodo.
                Nunc id urna ut lectus pharetra dictum. Aliquam ullamcorper pretium arcu ut congue. Aenean in velit sem.
                Nulla tincidunt ex vitae ante egestas iaculis. Sed in iaculis neque. Nulla quis tempor ante, ac pharetra
                tellus. Donec varius lectus quis molestie gravida. Maecenas non ante sit amet metus congue consectetur
                nec vitae est. Aliquam erat volutpat.",
        ]);
        DB::table('literatures')->insert([
            'title' => Str::random(10),
            'text' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec est
                ac felis laoreet efficitur. Phasellus egestas luctus sem ac ultricies. Praesent ornare, enim vel mollis
                faucibus, quam purus fermentum nisl, et porta orci mi eu quam. Curabitur quis diam quis leo sodales
                hendrerit et a diam. Vestibulum interdum quis est quis semper. Ut imperdiet aliquet ultrices. Quisque
                semper nibh nulla, vitae imperdiet mi gravida a. Curabitur varius molestie sapien vel faucibus. Integer
                vestibulum nisl eu commodo tempus. Curabitur fermentum ex ut odio eleifend pellentesque. Pellentesque
                pellentesque enim non leo suscipit scelerisque. In quis ipsum ipsum. Nulla vel neque vitae magna
                fermentum sagittis at vel velit.
                Quisque non diam a lectus dapibus venenatis non et mauris. Aliquam feugiat, sem sed sodales scelerisque,
                dui justo cursus ex, non vehicula leo elit a turpis. Donec accumsan augue nunc, at mollis tortor posuere
                in. Integer tempus urna dolor, id blandit tortor mattis id. Sed at ullamcorper enim. Nulla nibh felis,
                pulvinar at urna ac, dignissim faucibus nibh. Donec ut lobortis ipsum, vitae ultricies justo. Donec
                imperdiet libero sit amet tortor laoreet lobortis. Proin porttitor augue eu tristique tincidunt. Nulla
                scelerisque ut sem nec tristique. Suspendisse bibendum est et sapien molestie dictum. In consectetur
                urna a purus lobortis, ut imperdiet mi consequat. Integer vitae ante luctus, egestas orci sit amet,
                laoreet risus. Donec sed eleifend quam, at varius lorem. Donec condimentum nibh a diam eleifend feugiat.
                In hac habitasse platea dictumst. Aliquam semper, mauris quis varius pharetra, magna dolor sodales
                lorem, a dignissim lectus odio quis lacus. Aliquam ultricies tellus lacinia ante consectetur, vitae
                dapibus purus rutrum. Nam at feugiat leo, eget venenatis ante. Nam elit arcu, viverra eu mollis eget,
                venenatis vitae leo. Phasellus sit amet iaculis orci. Proin laoreet fermentum tortor non fringilla.
                Nulla odio mauris, luctus ut dignissim lacinia, eleifend ac diam. Etiam quis risus in erat aliquet
                varius non nec lacus. Duis nec fringilla metus, in consequat orci. Integer ut ullamcorper nulla. Quisque
                ipsum orci, vehicula a ante id, lacinia vestibulum erat. Etiam eget egestas tellus, at semper orci.
                Vestibulum id arcu sodales, sagittis nibh nec, mollis elit. Pellentesque vestibulum nibh nec dolor
                feugiat, ac lacinia arcu tempus. Vestibulum gravida, tellus sed volutpat lacinia, eros nibh semper
                lectus, sit amet venenatis lorem lacus vel enim. Orci varius natoque penatibus et magnis dis parturient
                montes, nascetur ridiculus mus. Quisque pharetra auctor eros quis commodo.
                Nunc id urna ut lectus pharetra dictum. Aliquam ullamcorper pretium arcu ut congue. Aenean in velit sem.
                Nulla tincidunt ex vitae ante egestas iaculis. Sed in iaculis neque. Nulla quis tempor ante, ac pharetra
                tellus. Donec varius lectus quis molestie gravida. Maecenas non ante sit amet metus congue consectetur
                nec vitae est. Aliquam erat volutpat.",
        ]);
    }
}
