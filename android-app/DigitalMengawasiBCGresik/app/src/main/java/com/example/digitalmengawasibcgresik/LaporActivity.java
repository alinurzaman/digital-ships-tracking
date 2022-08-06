package com.example.digitalmengawasibcgresik;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class LaporActivity extends AppCompatActivity {

    Spinner spinner_lokasi;
    ProgressDialog progressDialog;
    Adapter adapter;
    List<DataLokasi> listLokasi = new ArrayList<DataLokasi>();

    public static final String URL_LOKASI = "http://laporbcgresik.com/get_lokasi.php";
    private static final String TAG = LaporActivity.class.getSimpleName();

    public static final String TAG_ID = "id_lokasi";
    public static final String TAG_LOKASI = "nama_lokasi";
    private Spinner benderaSpinner;
    private Spinner kategoriSpinner;
    private Spinner imporSpinner;

    private EditText namasarkut, tanggaleta, pukuleta, tanggaletb, pukuletb, muatan;
    private Button btn_submit;
    private ProgressBar loading;
    private static String URL_SUBMIT = "http://192.168.18.16/dimasgresik/androidsubmit.php";
    private String idagen;
    private String selectedlokasi;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lapor);

        Bundle extras = getIntent().getExtras();
        idagen = extras.getString("idagen");

        benderaSpinner = (Spinner) findViewById(R.id.bendera);
        ArrayAdapter<CharSequence> benderaAdapter = ArrayAdapter.createFromResource(this,R.array.bendera,android.R.layout.simple_spinner_item);
        benderaAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        benderaSpinner.setAdapter(benderaAdapter);

        kategoriSpinner = (Spinner) findViewById(R.id.kategori);
        ArrayAdapter<CharSequence> kategoriAdapter = ArrayAdapter.createFromResource(this,R.array.kategori,android.R.layout.simple_spinner_item);
        kategoriAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        kategoriSpinner.setAdapter(kategoriAdapter);

        imporSpinner = (Spinner) findViewById(R.id.impor);
        ArrayAdapter<CharSequence> imporAdapter = ArrayAdapter.createFromResource(this,R.array.impor,android.R.layout.simple_spinner_item);
        imporAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        imporSpinner.setAdapter(imporAdapter);

        spinner_lokasi = (Spinner) findViewById(R.id.lokasisandar);
        spinner_lokasi.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                selectedlokasi = listLokasi.get(position).getId();
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

        adapter = new Adapter(LaporActivity.this, listLokasi);
        spinner_lokasi.setAdapter(adapter);

        callData();

        namasarkut = findViewById(R.id.namasarkut);
        tanggaleta = findViewById(R.id.tanggaleta);
        pukuleta = findViewById(R.id.pukuleta);
        tanggaletb = findViewById(R.id.tanggaletb);
        pukuletb = findViewById(R.id.pukuletb);
        muatan = findViewById(R.id.muatan);
        loading = findViewById(R.id.loadingsubmit);
        btn_submit = findViewById(R.id.btn_submit);

        btn_submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Submit();
            }
        });
    }

    private void Submit(){
        loading.setVisibility(View.VISIBLE);
        btn_submit.setVisibility(View.GONE);

        final String mnamasarkut = namasarkut.getText().toString().trim();
        final String mbendera = benderaSpinner.getSelectedItem().toString();
        final String mtanggaleta = tanggaleta.getText().toString().trim();
        final String mpukuleta = pukuleta.getText().toString().trim();
        final String mtanggaletb = tanggaletb.getText().toString().trim();
        final String mpukuletb = pukuletb.getText().toString().trim();
        final String mkategori = kategoriSpinner.getSelectedItem().toString();
        final String mmuatan = muatan.getText().toString().trim();
        final String mimpor = imporSpinner.getSelectedItem().toString();
        final String mlokasi = selectedlokasi;

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_SUBMIT, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try{
                    JSONObject jsonObject = new JSONObject(response);
                    String success = jsonObject.getString("success");
                    if(success.equals("1")){
                        Toast.makeText(LaporActivity.this, "Laporan berhasil dibuat!", Toast.LENGTH_LONG).show();
                        loading.setVisibility(View.GONE);
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                    Toast.makeText(LaporActivity.this, "Laporan gagal: " + e.toString(), Toast.LENGTH_LONG).show();
                    loading.setVisibility(View.GONE);
                    btn_submit.setVisibility(View.VISIBLE);
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(LaporActivity.this, "Laporan gagal: " + error.toString(), Toast.LENGTH_LONG).show();
                loading.setVisibility(View.GONE);
                btn_submit.setVisibility(View.VISIBLE);
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("namasarkut", mnamasarkut);
                params.put("bendera", mbendera);
                params.put("lokasi", mlokasi);
                params.put("tanggaleta", mtanggaleta);
                params.put("pukuleta", mpukuleta);
                params.put("tanggaletb", mtanggaletb);
                params.put("pukuletb", mpukuletb);
                params.put("kategori", mkategori);
                params.put("muatan", mmuatan);
                params.put("impor", mimpor);
                params.put("idagen", idagen);
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);


    }


    private void callData() {
        listLokasi.clear();

        progressDialog = new ProgressDialog(LaporActivity.this);
        progressDialog.setCancelable(false);
        progressDialog.setMessage("Loading...");
        showDialog();

        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(URL_LOKASI, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                Log.e(TAG, response.toString());
                for (int i = 0; i < response.length(); i++) {
                    try {
                        JSONObject object = response.getJSONObject(i);
                        DataLokasi item = new DataLokasi();
                        item.setId(object.getString(TAG_ID));
                        item.setNamalokasi(object.getString(TAG_LOKASI));
                        listLokasi.add(item);
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }
                adapter.notifyDataSetChanged();
                hideDialog();
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                VolleyLog.e(TAG, "Error: " + error.getMessage());
                Toast.makeText(LaporActivity.this, error.getMessage(), Toast.LENGTH_LONG).show();
                hideDialog();
            }
        });

        AppController.getInstance().addToRequestQueue(jsonArrayRequest);
    }

    private void showDialog() {
        if (!progressDialog.isShowing())
            progressDialog.show();
    }

    private void hideDialog() {
        if (progressDialog.isShowing())
            progressDialog.dismiss();
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        this.finish();
    }
}
