package com.example.digitalmengawasibcgresik;

import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.List;

public class Adapter extends BaseAdapter {
    private Activity activity;
    private LayoutInflater inflater;
    private List<DataLokasi> item;

    public Adapter(Activity activity, List<DataLokasi> item){
        this.activity = activity;
        this.item = item;
    }

    @Override
    public int getCount() {
        return item.size();
    }

    @Override
    public Object getItem(int location) {
        return item.get(location);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        if(inflater == null){
            inflater = (LayoutInflater) activity.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        }
        if (convertView == null){
            convertView = inflater.inflate(R.layout.list_lokasi, null);
        }
        TextView lokasi = (TextView) convertView.findViewById(R.id.lokasi);

        DataLokasi dataLokasi;
        dataLokasi = item.get(position);

        lokasi.setText(dataLokasi.getNamalokasi());

        return convertView;
    }
}
