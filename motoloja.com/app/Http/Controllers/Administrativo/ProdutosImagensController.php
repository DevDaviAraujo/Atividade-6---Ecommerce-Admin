<?php
namespace App\Http\Controllers\Administrativo;
use App\Http\Controllers\Controller;
use App\Models\Produtos;
use App\Models\ProdutosCategorias;
use App\Models\ProdutosImagens;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;



class ProdutosImagensController extends Controller {

    public function deletar(Request $request) {
        $produtoImagem = ProdutosImagens::find($request->id);
        $produtoImagem->delete();

        return redirect()->back();
    }

    public function definirImagemPrincipal($idProdutos,$idImagem) {

        $outrasImagens = ProdutosImagens::where('idProdutos',$idProdutos)->update(['imagemPrincipal' => false]);
        
        $imagem = ProdutosImagens::find($idImagem);
        $imagem->imagemPrincipal = true;
        $imagem->save();

        return redirect()->back();

    }


    public function uploadImage(Request $request){

            // validação de imagem

        $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = false;

        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();


        // pasta de imagens
        $destinationPath = public_path('/uploads/produtos');

        $image->move($destinationPath, $input['imagename']); 

        $produtoImagens = new ProdutosImagens();
        $produtoImagens->idProdutos = $request->idProdutos;
        $produtoImagens->nome = $request->image;
        $produtoImagens->imagem = $input['imagename'];
        $produtoImagens->imagemPrincipal = false;
        $produtoImagens->save(); 

        return back()->with('success','Image Upload successful');
  }


}