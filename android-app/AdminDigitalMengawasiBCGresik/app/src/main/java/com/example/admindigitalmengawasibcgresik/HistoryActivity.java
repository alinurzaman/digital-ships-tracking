package com.example.admindigitalmengawasibcgresik;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class HistoryActivity extends AppCompatActivity {
    RecyclerView recyclerView;
    ArrayList<HashMap<String, String>> list_data;

    private StringRequest stringRequest;

    private String dari, sampai;

    public static final String URL_HISTORY = "http://admin.laporbcgresik.com/get_history.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_history);

        Bundle extras = getIntent().getExtras();
        dari = extras.getString("dari");
        sampai = extras.getString("sampai");

        recyclerView = findViewById(R.id.rec_view);
        LinearLayoutManager llm = new LinearLayoutManager(this);
        llm.setOrientation(LinearLayoutManager.VERTICAL);
        recyclerView.setLayoutManager(llm);

        list_data = new ArrayList<HashMap<String, String>>();

        stringRequest = new StringRequest(Request.Method.POST, URL_HISTORY, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Log.d("response", response);
                try{
                    JSONObject jsonObject = new JSONObject(response);
                    JSONArray jsonArray = jsonObject.getJSONArray("laporan");
                    for (int a = 0; a < jsonArray.length(); a++) {
                        JSONObject json = jsonArray.getJSONObject(a);
                        HashMap<String, String> map = new HashMap<String, String>();
                        map.put("id", "ID Laporan: " + json.getString("id_laporan"));
                        map.put("tgl", "Tanggal Laporan: " + json.getString("tanggal_laporan"));
                        map.put("namasarkut", "Nama Sarkut: " + json.getString("sarana_laporan"));
                        map.put("bendera", "Bendera: "+json.getString("bendera_laporan"));
                        map.put("lokasi", "Lokasi Sandar: " + json.getString("nama_lokasi"));
                        map.put("tgleta", "ETA: " + json.getString("tanggaleta_laporan"));
                        map.put("pukuleta", "Pukul: " + json.getString("eta_laporan"));
                        map.put("tgletb", "ETB: " + json.getString("tanggaletb_laporan"));
                        map.put("pukuletb", "Pukul: " + json.getString("etb_laporan"));
                        map.put("kategori", "Kategori: " + json.getString("kategori_laporan"));
                        map.put("muatan", "Muatan: " + json.getString("muatan_laporan"));
                        map.put("kegiatan", "Kegiatan: " + json.getString("impor_laporan"));
                        if(json.getString("bc10_laporan").equals("null")){
                            map.put("bc10", "BC 1.0: Belum Diproses");
                        } else{
                            map.put("bc10", "BC 1.0: " + json.getString("nobc10_laporan"));
                            map.put("filebc10", "http://" + json.getString("bc10_laporan"));
                        }
                        if(json.getString("bc11_laporan").equals("null")){
                            map.put("bc11", "BC 1.1: Belum Diproses");
                        } else{
                            map.put("bc11", "BC 1.1: " + json.get("nobc11_laporan"));
                            map.put("filebc11", "http://" + json.getString("bc11_laporan"));
                        }
                        if(json.getString("filerute_laporan").equals("null")){
                            map.put("rute", "Rute: Belum Diproses");
                        } else{
                            map.put("rute", "Rute: " + json.get("rute_laporan"));
                            map.put("filerute", "http://" + json.getString("filerute_laporan"));
                        }
                        list_data.add(map);
                        HistoryAdapter adapter = new HistoryAdapter(HistoryActivity.this, list_data);
                        recyclerView.setAdapter(adapter);
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(HistoryActivity.this, "Gagal memuat data: " + error.toString(), Toast.LENGTH_LONG).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("dari", dari);
                params.put("sampai", sampai);
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        this.finish();
    }
}
