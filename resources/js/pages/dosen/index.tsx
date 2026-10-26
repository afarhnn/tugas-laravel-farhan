import { Head, router } from '@inertiajs/react';
import { Pencil, Plus, Trash2 } from 'lucide-react';
import { Button } from '@/components/ui/button';

type Dosen = {
    nidn: string;
    nama: string;
    jabatan: string;
    kepakaran: string;
};

export default function DosenIndex({ dosens }: { dosens: Dosen[] }) {
    const hapus = (dosen: Dosen) => {
        if (window.confirm(`Yakin ingin menghapus dosen ${dosen.nama}?`)) {
            router.delete(`/dosen/${dosen.nidn}`);
        }
    };

    return (
        <>
            <Head title="Data Dosen Pembimbing" />
            <main className="mx-auto w-full max-w-6xl p-4 sm:p-8">
                <header className="mb-6 flex flex-col gap-4 border-b pb-5 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p className="mb-1 text-sm font-medium text-emerald-700">
                            Sistem Informasi Tugas Akhir dan Skripsi
                        </p>
                        <h1 className="text-2xl font-bold sm:text-3xl">
                            Daftar Dosen Pembimbing
                        </h1>
                    </div>
                    <Button onClick={() => router.visit('/dosen/create')}>
                        <Plus /> Tambah Dosen
                    </Button>
                </header>

                <div className="overflow-hidden rounded-lg border bg-card shadow-sm">
                    <div className="overflow-x-auto">
                        <table className="w-full min-w-[760px] text-left text-sm">
                            <thead className="border-b bg-muted/60 text-xs uppercase text-muted-foreground">
                                <tr>
                                    <th className="px-4 py-3">NIDN</th>
                                    <th className="px-4 py-3">Nama Lengkap</th>
                                    <th className="px-4 py-3">Jabatan</th>
                                    <th className="px-4 py-3">Kepakaran Riset</th>
                                    <th className="w-32 px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody className="divide-y">
                                {dosens.map((dosen) => (
                                    <tr key={dosen.nidn} className="transition-colors hover:bg-muted/40">
                                        <td className="px-4 py-4 font-mono font-medium">{dosen.nidn}</td>
                                        <td className="px-4 py-4 font-medium">{dosen.nama}</td>
                                        <td className="px-4 py-4">{dosen.jabatan}</td>
                                        <td className="px-4 py-4 text-muted-foreground">{dosen.kepakaran}</td>
                                        <td className="px-4 py-4">
                                            <div className="flex justify-end gap-1">
                                                <Button
                                                    variant="ghost"
                                                    size="icon"
                                                    title="Edit dosen"
                                                    onClick={() => router.visit(`/dosen/${dosen.nidn}/edit`)}
                                                >
                                                    <Pencil />
                                                </Button>
                                                <Button
                                                    variant="ghost"
                                                    size="icon"
                                                    title="Hapus dosen"
                                                    className="text-red-600 hover:text-red-700"
                                                    onClick={() => hapus(dosen)}
                                                >
                                                    <Trash2 />
                                                </Button>
                                            </div>
                                        </td>
                                    </tr>
                                ))}
                                {dosens.length === 0 && (
                                    <tr>
                                        <td colSpan={5} className="px-4 py-12 text-center text-muted-foreground">
                                            Belum ada data dosen.
                                        </td>
                                    </tr>
                                )}
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </>
    );
}

DosenIndex.layout = {
    breadcrumbs: [{ title: 'Data Dosen', href: '/' }],
};
