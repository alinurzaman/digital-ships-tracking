package com.example.admindigitalmengawasibcgresik;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;

public class CariActivity extends AppCompatActivity {
    private EditText dari, sampai;
    private Button btn_cari;
    private ProgressBar loading;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cari);

        dari = findViewById(R.id.dari);
        sampai = findViewById(R.id.sampai);
        btn_cari = findViewById(R.id.btn_cari);
        loading = findViewById(R.id.loading_cari);

        btn_cari.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String mDari = dari.getText().toString().trim();
                String mSampai = sampai.getText().toString().trim();

                if(!mDari.isEmpty() || !mSampai.isEmpty()){
                    Cari(mDari, mSampai);
                } else{
                    dari.setError("Masukkan Dari Tanggal!");
                    sampai.setError("Masukkan Sampai Tanggal!");
                }
            }
        });
    }

    private void Cari(String dari, String sampai){
        loading.setVisibility(View.VISIBLE);
        btn_cari.setVisibility(View.GONE);

        Intent intent = new Intent(CariActivity.this, HistoryActivity.class);
        intent.putExtra("dari", dari);
        intent.putExtra("sampai", sampai);
        startActivity(intent);

        loading.setVisibility(View.GONE);
        this.finish();
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        this.finish();
    }

}
