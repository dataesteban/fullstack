<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use App\resultadoModel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class resultadoExports implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [

            'Consecutivo Muestra',
            'Fecha Resultado',
            'Fecha Recepcion',
            'Documento',
            'Nombre Completo',
            'Punto Muestreo',
            'Correo',
            'Telefono',

            'Parametro',
            'Unidad',
            'Metodo',
            'Minimo',
            'Maximo',
            'Resultado'

        ];
    }




    public function collection()
    {
        $resultado = resultadoModel::join('muestra', 'resultado.id_muestra', '=', 'muestra.id_muestra')
            ->join('parametros', 'resultado.id_parametro', '=', 'parametros.id_parametro')
            ->join('usuario_cliente', 'muestra.idCliente', '=', 'usuario_cliente.idCliente')
            ->select(

                'resultado.id_muestra',
                'resultado.fecha_resultado',
                'muestra.fecha_rrecepcion',

                'usuario_cliente.documento',
                'usuario_cliente.NombreCompleto',
                'muestra.punto_muestreo',

                'usuario_cliente.Correo',
                'usuario_cliente.Telefono',

                'parametros.Nom_parametro',
                'parametros.Unidad_medida',
                'parametros.metodo',
                'parametros.minimo',
                'parametros.maximo',
                'resultado.resultado'

            )
            ->distinct()->get();


        return $resultado;
    }
}
