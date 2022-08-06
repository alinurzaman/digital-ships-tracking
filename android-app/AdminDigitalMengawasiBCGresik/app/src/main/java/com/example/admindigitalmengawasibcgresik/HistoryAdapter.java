package com.example.admindigitalmengawasibcgresik;

import android.content.Context;
import android.text.Html;
import android.text.Spanned;
import android.text.method.LinkMovementMethod;
import android.text.util.Linkify;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;
import java.util.HashMap;

public class HistoryAdapter extends RecyclerView.Adapter<HistoryAdapter.ViewHolder> {
    Context context;
    ArrayList<HashMap<String, String>> list_data;
    Spanned linkbc10, linkbc11, linkrute;

    public HistoryAdapter(HistoryActivity historyActivity, ArrayList<HashMap<String, String>> list_data){
        this.context = historyActivity;
        this.list_data = list_data;
    }


    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_history, null);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull HistoryAdapter.ViewHolder holder, int position) {
        holder.id.setText(list_data.get(position).get("id"));
        holder.tgl.setText(list_data.get(position).get("tgl"));
        holder.namasarkut.setText(list_data.get(position).get("namasarkut"));
        holder.bendera.setText(list_data.get(position).get("bendera"));
        holder.lokasi.setText(list_data.get(position).get("lokasi"));
        holder.tgleta.setText(list_data.get(position).get("tgleta"));
        holder.pukuleta.setText(list_data.get(position).get("pukuleta"));
        holder.tgletb.setText(list_data.get(position).get("tgletb"));
        holder.pukuletb.setText(list_data.get(position).get("pukuletb"));
        holder.kategori.setText(list_data.get(position).get("kategori"));
        holder.muatan.setText(list_data.get(position).get("muatan"));
        holder.kegiatan.setText(list_data.get(position).get("kegiatan"));
        if(list_data.get(position).get("bc10").equals("BC 1.0: Belum Diproses")){
            holder.bc10.setText(list_data.get(position).get("bc10"));
        }
        else {
            linkbc10 = Html.fromHtml("<a href='" + list_data.get(position).get("filebc10") + "'>" +
                    list_data.get(position).get("bc10") + "</a>");
            holder.bc10.setMovementMethod(LinkMovementMethod.getInstance());
            holder.bc10.setText(linkbc10);
        }
        if(list_data.get(position).get("bc11").equals("BC 1.1: Belum Diproses")){
            holder.bc11.setText(list_data.get(position).get("bc11"));
        }
        else {
            linkbc11 = Html.fromHtml("<a href='" + list_data.get(position).get("filebc11") + "'>" +
                    list_data.get(position).get("bc11") + "</a>");
            holder.bc11.setMovementMethod(LinkMovementMethod.getInstance());
            holder.bc11.setText(linkbc11);
        }
        if(list_data.get(position).get("rute").equals("Rute: Belum Diproses")){
            holder.rute.setText(list_data.get(position).get("rute"));
        } else {
            linkrute = Html.fromHtml("<a href='" + list_data.get(position).get("filerute") + "'>" +
                    list_data.get(position).get("rute") + "</a>");
            holder.rute.setMovementMethod(LinkMovementMethod.getInstance());
            holder.rute.setText(linkrute);
        }

    }

    @Override
    public int getItemCount() {
        return list_data.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder{
        TextView id, tgl, namasarkut, bendera, lokasi, tgleta, pukuleta, tgletb, pukuletb,
                kategori, muatan, kegiatan, bc10, bc11, rute;
        public ViewHolder(View itemView){
            super(itemView);

            id = (TextView) itemView.findViewById(R.id.h_id);
            tgl = (TextView) itemView.findViewById(R.id.h_tgl);
            namasarkut = (TextView) itemView.findViewById(R.id.h_namasarkut);
            bendera = (TextView) itemView.findViewById(R.id.h_bendera);
            lokasi = (TextView) itemView.findViewById(R.id.h_lokasi);
            tgleta = (TextView) itemView.findViewById(R.id.h_tgleta);
            pukuleta = (TextView) itemView.findViewById(R.id.h_pukuleta);
            tgletb = (TextView) itemView.findViewById(R.id.h_tgletb);
            pukuletb = (TextView) itemView.findViewById(R.id.h_pukuletb);
            kategori = (TextView) itemView.findViewById(R.id.h_kategori);
            muatan = (TextView) itemView.findViewById(R.id.h_muatan);
            kegiatan = (TextView) itemView.findViewById(R.id.h_kegiatan);
            bc10 = (TextView) itemView.findViewById(R.id.h_bc10);
            bc11 = (TextView) itemView.findViewById(R.id.h_bc11);
            rute = (TextView) itemView.findViewById(R.id.h_rute);

        }
    }
}
