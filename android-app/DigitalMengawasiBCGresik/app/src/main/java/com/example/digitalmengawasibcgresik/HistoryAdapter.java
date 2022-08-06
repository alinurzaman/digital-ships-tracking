package com.example.digitalmengawasibcgresik;

import android.content.Context;
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
        holder.status.setText(list_data.get(position).get("status"));
    }

    @Override
    public int getItemCount() {
        return list_data.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder{
        TextView id, tgl, namasarkut, bendera, lokasi, tgleta, pukuleta, tgletb, pukuletb,
                kategori, muatan, kegiatan, status;
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
            status = (TextView) itemView.findViewById(R.id.h_status);

        }
    }
}
